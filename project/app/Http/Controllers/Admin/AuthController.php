<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //获取权限列表
        $auth=DB::table("node")->get();
        return view("Admin.Auth.index",['auth'=>$auth]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //加载视图
        return view("Admin.Auth.add");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //处理添加
        // $data=$request->all();
        // dd($data);
        $data=$request->except(['_token']);
        $data['status']="0";
        //入库
        if(DB::table("node")->insert($data)){
            return redirect("/auth")->with("success","添加成功");
        }else{
            return back()->with("error","添加失败");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //获取数据
        $data=DB::table("node")->where("id","=",$id)->first();
        //dd($data);
        //加载修改页面
        return view("Admin.Auth.edit",['data'=>$data]);
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
        //处理添加操作
        $data=$request->except(['_method','_token']);
        $data['status']="0";
        // $data=$request->all();
        // dd($data);
        // 入库
        if(DB::table("node")->where("id","=",$id)->update($data)){
            return redirect("/auth")->with("success","修改成功");
        }else{
            return back()->with("error","修改失败");
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
        if(DB::table("node")->where("id","=",$id)->delete()){
            return redirect("/auth")->with("success","删除成功");
        }else{
            return back()->with("error","删除失败");
        }
    }
}
