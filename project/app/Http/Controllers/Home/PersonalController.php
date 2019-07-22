<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Http\Requests\HomeUserRequest;
use Hash;
class PersonalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id=session('username')->id;
        $aa=DB::table("user")->where("id","=",$id)->first();
        //加载修改模板
        return view("Home.Personal.edit",['aa'=>$aa]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $checkphone=RegisterController::checkphone();
        $checkname=RegisterController::checkname();
        $checkemail=RegisterController::checkemail();


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id=session('username')->id;
        $data=$request->except(['_token']);
        $data['token']=str_random(50);
        $data['password']=Hash::make($data['password']);
        if(empty($data['username'])){
            $data['username']="kong";
        }
        // dd($data);
        if(DB::table("user")->where("id","=",$id)->update($data)){
            return redirect("/personal")->with("success","修改成功");
            // session(['username'=>$username]);
        }else{
            return back()->with("error","修改失败");
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
        //return redirect("/personal/update");
        
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
        // echo  $id;die;
         //判断是否有文件上传(头像)
        $data=$request->file('face');
        // dd($_FILES);
         // dd($request);
        $a = "";
        // dd($request->file("face"));
        if($request->hasFile('face')){
            //获取文件文件后缀
            $ext = $request->file("face")->getClientOriginalExtension();
            //初始化文件名
            $name = time().rand(1,10000).".".$ext;
            $a = $name;
            //添加到指定文件
            $request->file("face")->move("./statigc/Public/images/".date("Y-m-d"),$name);
        }
        $data=$request->except(['_method','_token']);
        $data['face'] = date("Y-m-d")."/".$a;
        // dd($data);
        if(DB::table("user")->where("id","=",$id)->update($data)){
            return redirect("/personal")->with("success","修改成功");
            // echo "修改成功";
        }else{
            return back()->with("error","修改失败");
            // echo "修改失败";
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
