<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class PersonalOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //获取数据
        // dd($request);
        $id=session("username")->id;
        //  未付款
        $data=DB::table("order")->where("user_id","=",$id)->where("status","=",1)->get();
        //  已付款
        $data1=DB::table("order")->where("user_id","=",$id)->where("status","=",2)->get();
        //已发货
        $data2=DB::table("order")->where("user_id","=",$id)->where("status","=",3)->get();
        //确认收货
        $data3=DB::table("order")->where("user_id","=",$id)->where("status","=",4)->get();
        //加载视图
        return view("Home.Personal.Order",['data'=>$data,'data1'=>$data1,'data2'=>$data2,'data3'=>$data3]);
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
        // echo "$id";
        $data=DB::table("order")->where("id","=",$id)->first();
        if($data->status==3){
            $data1=DB::table("order")->where("id","=",$id)->update(['status'=>4]);
    }
        return back();
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
