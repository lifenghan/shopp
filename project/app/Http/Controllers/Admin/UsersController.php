<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\UsersInsertRequest;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $name = $request->input("username");
        $data = User::where("username","like","%".$name."%")->paginate(2);
        return view("Admin.User.index",['data'=>$data,'i'=>'1','request'=>$request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("Admin.User.add");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UsersInsertRequest $request)
    {
//        dd($request->all());
        $data = $request->except(['_token','repassword']);
        $data['status'] = 1;
        $data['token'] = str_random(50);
//        dd($errors->all());
        if(User::create($data)){
            return redirect("/adminusers")->with("success","添加成功");
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
        $data = User::find($id)->info;
//        dd($data);
        return view("Admin.User.info",['data'=>$data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = User::find($id);
        return view("Admin.User.edit",['data'=>$data]);
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
//        dd($request->all());
        $data = $request->except(['_method','_token']);
        if(User::where("id","=",$id)->update($data)){
            return redirect("/adminusers")->with("success","修改成功");
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
//        dd($id);
        if(User::where("id","=",$id)->delete()){
            return redirect("/adminusers")->with("success","删除成功");
        }else{
            return back()->with("error","删除失败");
        }
    }
    public function address($id){
        $data = User::find($id)->address;
//        dd($data);
        return view("Admin.User.address",['data'=>$data,'i'=>1]);
    }
    public function a(){
        fun();
    }
    public function b(){
        $a = new \A();
        $a->sendphone();
    }
}
