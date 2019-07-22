<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ShoppingCartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $user_id = session("username")['id'];
      $data = DB::table("shopping_cart")->join("product","shopping_cart.product_id","=","product.id")->select("shopping_cart.name as sname","shopping_cart.detail","shopping_cart.id as sid","shopping_cart.number","product.name as pname","product.price","product.stock","product.main_img","product.id as pid")->where("user_id","=",$user_id)->get();
      $arr = array();
      $arr1 = array();
      foreach($data as $value){
         $sname = explode(":",$value->sname);
         $detail = explode(":",$value->detail);
        $value->attr = array_combine($sname,$detail);
      }
        return view("Home.Cart.index",['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $data = $request->all();
        $data['name'] = rtrim($data['name'],":");
        $data['detail'] = rtrim($data['detail'],":");
        $data['user_id'] = session("username")->id;
        //判断是否已添加购物车
        $product_id = $request->input("product_id");
        $number = $request->input("number");
        $car = DB::table("shopping_cart")->where("user_id","=",session("username")->id)->where("product_id","=",$product_id)->first();
        if($car){
            $num = $car->number + $number;
           $result= DB::table("shopping_cart")->where("user_id","=",session("username")->id)->where("product_id","=",$product_id)->update(["number"=>$num]);
        }else{
            $result = DB::table("shopping_cart")->insert($data);
        }

        if($result){
            echo 1;
        }else{
            echo 2;
        }
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
    public function show($id)
    {
       $result = DB::table("shopping_cart")->where("id","=",$id)->delete();
       if($result){
           echo 1;
       }else{
           echo 2;
       }
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
}
