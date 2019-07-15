<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Hash;
//导入校验请求类
//use App\Http\Requests\UserInsertRequest;
class AdminUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //获取数据进行遍历
        $data=DB::table("admin_users")->get();
        //加载管理员列表
        return view("Admin.AdminUser.index",['data'=>$data]);
    }

    //分配角色
    public function role($id){
        //获取当前管理员信息
        $adminuser=DB::table("admin_users")->where("id","=",$id)->first();
        //获取所有角色信息
        $role=DB::table("role")->get();
        //获取当前管理角色
        $rid=DB::table("user_role")->where("uid","=",$id)->get();
        $rids=array();
        if(count($rid)){
            //遍历
            foreach($rid as $key=>$value){
                $rids[]=$value->rid;
            }
            // dd($rids);
             //加载模板
        return view("Admin.AdminUser.role",['adminuser'=>$adminuser,'role'=>$role,'rids'=>$rids]);
        }else{
             //加载模板
        return view("Admin.AdminUser.role",['adminuser'=>$adminuser,'role'=>$role,'rids'=>array()]);
        }
    }

    //保存角色
    public function saverole(Request $request){
        //获取管理员ID
        $uid=$request->input("uid");
        //获取选择的角色
        $rids=$_POST['rids'];
        // echo $uid;
        // dd($rids);
        // 删除当前管理员已经有的角色
        DB::table("user_role")->where("uid","=",$uid)->delete();
        //遍历数据
        foreach($rids as $key=>$value){
            //封装要插入的数据
            $data['uid']=$uid;
            $data['rid']=$value;
            //把选择的角色存储在user_role表
            DB::table("user_role")->insert($data);
        }

        return redirect("/adminuser")->with("success","角色分配成功");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //加载添加模板
        return view("Admin.AdminUser.add");
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
        // $info=$request->all();
        // dd($info);
        $data=$request->except(['_token']);
        $data['password']=Hash::make($data['password']);
        if(DB::table("admin_users")->insert($data)){
            // echo "添加管理员成功";
            return redirect("/adminusers")->with("success",'添加管理员成功');
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
        //加载数据
        $data=DB::table("admin_users")->where("id","=",$id)->first();
        //加载修改页面
        return view("Admin.AdminUser.edit",['data'=>$data]);
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
        //处理添加的页面
        $data=$request->except(['_method','_token']);
        $data['password']=Hash::make($data['password']);
        // dd($data);
        if(DB::table("admin_users")->where("id","=",$id)->update($data)){
            return redirect("/adminusers")->with("success",'修改成功');
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
        if(DB::table("admin_users")->where("id","=",$id)->delete()){
            return redirect("/adminusers")->with("success","删除成功");
        }else{
            return back()->with("error","删除失败");
        }
    }
}
