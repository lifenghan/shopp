<?php

namespace App\Http\Controllers\Admin;

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
    public function index()
    {
        $data = DB::table("order")->join("user_address","order.address_id","=","user_address.id")->select("order.id","order.user_id","order.order_code","order.tot","order.status","order.create_time","user_address.name","user_address.phone","user_address.city")->get();
        foreach($data as $key=>$value){
            $value->create_time = date("Y-m-d H:i:s",$value->create_time);
            if($value->status == 1){
                $value->status = "未付款";
            }elseif($value->status == 2){
                $value->status = "已付款";
            }elseif($value->status == 3){
                $value->status = "已发货";
            }
        }
//        dd($data);
        return view("Admin.Order.index",["data"=>$data,"i"=>1]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
       $data = DB::table("order_info")->where("order_id","=",$id)->get();
       $a = array();
       foreach($data as $key=>$value){
           $a[] = $value->id;
       }
       $info = DB::table("order_info")->join("product","order_info.product_id","=","product.id")->select("order_info.num","order_info.tot","order_info.detail","product.name")->where("order_id","=",$id)->get();
//       dd($info);
        return view("Admin.Order.info",["info"=>$info,"i"=>1]);
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
