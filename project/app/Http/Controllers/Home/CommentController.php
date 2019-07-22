<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // echo"1111";
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // echo"222";
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // echo"33333";
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $data=DB::table("order")->where("id","=",$id)->get();
        // // dd($data);
        // foreach($data as $key=>$value){
        //     //存储到session中
        //     session(['orderid'=>$value->id]);
        // }
        // $orderid=session('orderid');
        // //查询order_info表获取商品ID
        // $product=DB::table("order_info")->where("order_id","=",$orderid)->get();
        // dd($product);
         //遍历这个表得到商品id
        // $pro="";
        //  foreach($product as $k=>$val){
        //     $pro .= $val->product_id.",";
        // }
        // $pro = rtrim($pro,",");
        
        //添加一个时间
        // $time=date("Y-m-d,H:i:s");
        // // dd($time);
        // //加载视图
        // return view("Home.Personal.addcomment",['orderid'=>$orderid,'pro'=>$pro,'time'=>$time]);
        
        $data=DB::table("order_info")->where("product_id","=",$id)->get();
         foreach($data as $key=>$value){
            //存储到session中
            session(['productid'=>$value->product_id]);
        }
        $productid=session('productid');
         //添加一个时间
        $time=date("Y-m-d,H:i:s");
        return view("Home.Personal.addcomment",['productid'=>$productid,'time'=>$time]);
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
        $data=$request->except(['_method','_token']);
        // dd($data);
        if(DB::table('comment')->insert($data)){
            return redirect("/personalorder");
        }

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
