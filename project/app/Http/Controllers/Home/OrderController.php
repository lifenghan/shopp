<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $data = $request->all();
       echo json_encode($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("Home.Order.index");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //购物从选中收获地址
    public function show($id)
    {

        $address = DB::table("user_address")->where("users_id","=",$id)->get();
//        dd($address);
        return view("Home.Order.address",["address"=>$address]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function info($data,$detail){
        //获取订单商品信息
        $detail= rtrim($detail,"|");
        $detail = explode("|",$detail);
        foreach($detail as $key=>$value){
            $detail[$key] = explode(",",$value);
        }
        $arr1 = array();
        foreach($detail as $key=>$value){
            $arr1[$value[0]] = $value[1];
        }
       $data = rtrim($data,"|");
        $a = explode("|",$data);
        foreach($a as $key=>$value){
            $a[$key] = trim($value,"{}");
        }
        foreach($a as $key=>$value){
            $a[$key] = str_replace("\"",'',$value);
        }
        foreach($a as $key=>$value){
            $a[$key] = explode(",",$value);
            }
       foreach($a as $key =>$value){
           foreach($value as $k=>$v){
               $a[$key][$k] = explode(":",$v);
           }
       }
       foreach($a as $key=>$value){
           foreach($value as $k=>$v){
               $a[$key][$v[0]] = $v[1];
           }
       }
       foreach($a as $key =>$value){
           foreach($value as $k=>$v){
               if(is_array($a[$key][$k])){
                   unset($a[$key][$k]);
               }
           }
       }
       foreach($a as $key=>$value){
           foreach($arr1 as $k=>$v){
               if($value['product_id']==$k){
                   $a[$key]['detail'] = $v;
               }
           }
       }
       $arr= array();
       foreach($a as $value){
         $arr[] = $value['product_id'];
       }
      $info = DB::table("product")->select("id","name","main_img")->whereIn("id",$arr)->get();
       $arr2 = array();
       foreach($info as $key=>$value){
           $arr2[$value->id] = $value->name;
       }
        $arr3 = array();
        foreach($info as $key=>$value){
            $arr3[$value->id] = $value->main_img;
        }
       foreach($a as $key=>$value){
           foreach($arr2 as $k=>$v){
               if($value['product_id']==$k){
                   $a[$key]['name']=$v;
               }
           }
       }
        foreach($a as $key=>$value){
            foreach($arr3 as $k=>$v){
                if($value['product_id']==$k){
                    $a[$key]['main_img']=$v;
                }
            }
        }

        //获取送货地址
        $user_id = session("username")->id;
       $address= DB::table("user_address")->where("users_id","=",$user_id)->where("default","=",1)->first();
        session(["order"=>$a]);
      return view("Home.Order.index",["a"=>$a,'address'=>$address]);
    }
    //订单收获地址执行
    public function address(Request $request){
       $id = $request->input("id");
       DB::table("user_address")->where("users_id","=",session("username")->id)->update(["default"=>0]);
       if(DB::table("user_address")->where("id","=",$id)->update(["default"=>1])){
           echo 1;
       }else{
           echo 2;
       };
    }

    public function add(Request $request){
        $data['user_id'] = session("username")->id;
        $data['order_code'] = time().rand(1,10000);
        $data['address_id'] = $request->input('address_id');
        $data['tot'] = $request->input('tot');
        $data['create_time'] = time();
        //插入数据的同时获取订单id
        $oid = DB::table("order")->insertGetId($data);
        //删除购物车中的数据
        $cart = array();
        foreach(session("order") as $value){
           $cart[] = $value['id'];
        }
        DB::table("shopping_cart")->whereIn("id",$cart)->delete();
        if($oid){
            $b= array();
            foreach(session("order") as $key => $value){
                $arr["order_id"] = $oid;
                $arr["product_id"] = $value['product_id'];
                $arr["num"] = $value['num'];
                $arr['tot'] = $value['tot'];
                $arr['detail'] = $value['detail'];
                $b[] = $arr;
            }
            if(DB::table("order_info")->insert($b)){
                $info["order_code"] = $data['order_code'];
                $info["tot"] = $data['tot'];
                $info["order_id"] = $oid;
                session(["order_info"=>$info]);
                return view("Home.Order.success");
            }else{
                return back();
            }
        }
    }
    //支付宝支付
    public function zhifu(){
        $code = session("order_info")["order_code"];
        pays($code,"商品支付","0.01","商品支付");
    }
    //支付成功页面
    public function yes(){
        DB::table("order")->where("id","=",session("order_info")["order_id"])->update(["status"=>2]);
        $info = DB::table("order")->where("id","=",session("order_info")["order_id"])->first();
        $aid = $info->address_id;
        $address = DB::table("user_address")->where("id","=",$aid)->first();
        return view("Home.Order.yes",["address"=>$address]);
    }
}
