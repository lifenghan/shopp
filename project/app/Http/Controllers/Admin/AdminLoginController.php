<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Hash;
class AdminLoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //销毁session
        $request->session()->pull('adminname');
        //删除权限
        $request->session()->pull("nodelist");
        return redirect("/adminlogin/create");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //加载登录界面
        return view("Admin.AdminLogin.index");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //检测当前登录的用户跟表数据对比
        $name=$request->input("name");
        // dd($name);
        $password=$request->input("password");
        $info=DB::table("admin_users")->where("name","=",$name)->first();
        // dd($info);
        if($info){
            // echo "账号正确ok";
            //检测密码
            if(Hash::check($password,$info->password)){
                //给session一个名字 存储管理员在session里
                session(['adminname'=>$name]);
                //获取当前登录用户的所有权限信息
                $list=DB::select("select n.name,n.mname,n.aname from user_role as ur,role_node as rn,node as n where ur.rid=rn.rid and rn.nid=n.id and uid={$info->id}");
                // dd($list);
                //2.初始化权限信息 让所有管理员都可以访问后台首页
                $nodelist['AdminController'][]="index";
                foreach($list as $key=>$value){
                    //把权限写入到$nodelist中
                    $nodelist[$value->mname][]=$value->aname;
                    //如果有create方法加入到store方法
                    if($value->aname=="create"){
                        $nodelist[$value->mname][]="store";
                    }
                    //如果有edit方法 加入update
                    if($value->aname=="edit"){
                        $nodelist[$value->mname][]="update";
                    }
                }   
                // dd($nodelist);
                //3.把初始化后的当前登录用户权限写入session
                session(['nodelist'=>$nodelist]);
                return redirect("/admin")->with("success","登录成功");
            }else{
                return back()->with("error","登录失败,密码错误");
            }
        }else{
            return back()->with("error","管理员账号错误,请重新登录");
        }
        // echo "niubi a ----------";
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
