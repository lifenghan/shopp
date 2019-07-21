<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
//导入模型类
use App\Models\Admin\User;
use DB;
use Hash;
use Mail;
class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //销毁session
        $request->session()->pull('username');
        return redirect("/homelogin/create");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //加载模板
        return view("Home.Login.login");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $email=$request->input("email");
        $password=$request->input("password");
        // dd($password);
        $info=User::where("email","=",$email)->first();
        // dd($info);
        if($info){
            // echo "ok";
            //检测密码
            if(Hash::check($password,$info->password)){
                // echo "ok";
                // 将账号存储在session中
                $data=DB::table("user")->select("id","username","email","phone","created_at")->where("email","=",$email)->first();
                // dd($data);
                session(['username'=>$data]);
                return redirect("/home");
            }else{
                return back()->with("error","密码有误");
            }
        }else{
            return back()->with("error","邮箱有误");
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

    //忘记密码
    public function forget(){
        //加载发送邮件模板
        return view("Home.Login.forget");
    }

    //发送邮件重置密码 $email 要注册的邮箱 $id 注册的用户id $token 校验参数
    public function sendMail($email,$id,$token){
        //闭包函数内部获取闭包函数外部的变量 use
        Mail::send("Home.Login.reset",['id'=>$id,'token'=>$token],function($message) use ($email){
             //接收方
            $message->to($email);
            //主题
            $message->subject("密码重置");
        });

        return true;
    }


    public function doforget(Request $request){
        //获取输入的邮箱
        $email=$request->input('email');
        $info=User::where("email","=",$email)->first();
        //调用发送邮件方法
        $res=$this->sendMail($email,$info->id,$info->token);
        if($res){
            return redirect("https://mail.qq.com");
        }
    }

    public function reset(Request $request){
        $id=$request->input("id");
        $token=$request->input("token");
        $info=User::where("id","=",$id)->first();
        if($token==$info->token){
            //加载重置密码模板
            return view("Home.Login.resets",['id'=>$id]);
        }
        
    }

    public function doreset(Request $request){
        $id=$request->input("id");
        //执行密码修改
        $data['password']=Hash::make($request->input("password"));
        $data['token']=str_random(50);
        //执行
        if(User::where("id","=",$id)->update($data)){
            return redirect("/homelogin/create");
        }
    }

}
