<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
//导入模型类
use App\Models\Admin\User;
class PersonalAddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //获取数据
        $id=session('username')->id;
        // $address=User::find($id)->address;
        $address=DB::table("user_address")->where("users_id","=",session('username')->id)->orderBy("id","asc")->get();
        // dd($address);
        if($address==null){
            // echo"还未添加收货地址,请先进行添加";
            return redirect("/personal/create");
        }
        //加载视图
        return view("Home.Personal.address",['address'=>$address]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function create()
    {
        //加载添加视图
        return view("Home.Personal.addressadd");
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $data=$request->except('_token');
        //正则去掉特殊字符
        preg_match_all('/[\x{4e00}-\x{9fff}]+/u',$data['city'],$m);
        $str=join("",$m[0]);
        $data['city']=$str;
        // dd($data);
        $data['users_id']=session('username')->id;
        // dd( $data['user_id']);
        if(DB::table("user_address")->insert($data)){
            return redirect("/personaladdress");
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
        // dd($id);
        // $id=session('username')->id;
        // $address=User::find($id)->address;
        $address=DB::table("user_address")->where("id","=",$id)->first();
        //加载地址修改页面
        return view("Home.Personal.addressedit",['address'=>$address]);
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
        // $uid=session('username')->id;
        $data=$request->except(['_method','_token']);
        // dd($data);
        //正则去掉特殊字符
        preg_match_all('/[\x{4e00}-\x{9fff}]+/u',$data['city'],$m);
        $str=join("",$m[0]);
        $data['city']=$str;
        //入库操作
        if(DB::table("user_address")->where("id","=",$id)->update($data)){
            return redirect("/personaladdress")->with("success","修改成功");
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
        // echo "$id";
        if(DB::table("user_address")->where("id","=",$id)->delete()){
             return redirect("/personaladdress")->with("success","删除成功");
        }else{
            return back()->with("error","删除失败");
        }
    }
}
