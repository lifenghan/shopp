<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
//导入模型类
use App\Models\Admin\User;
//导入哈希
use Hash;
//导入邮件
use Mail;
//导入校验码三方类
use Gregwar\Captcha\CaptchaBuilder;
class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return redirect("/homeregister/create");
    }

    //发送邮件测试
    public function send(){
        Mail::send("Home.Register.a",['id'=>12],function($message){
            //接收方
            $message->to("1227490476@qq.com");
            //主题
            $message->subject("我就是山东扛把子");
        });
    }
    //激活用户
    public function a(Request $request){
        $id=$request->input("id");
    }

    //引入校验码
    public function code(){
        ob_clean();//清除操作
        //实例化校验码类
        $builder = new CaptchaBuilder;
        //可以设置图片宽高及字体
        $builder->build($width = 100, $height = 40, $font = null);
        //获取验证码的内容
        $phrase = $builder->getPhrase();
        //把内容存入session方便和输入的校验码对比
        session(['vcode'=>$phrase]);
        //生成图片
        header("Cache-Control: no-cache, must-revalidate");
        header('Content-Type: image/jpeg');
        //输出
        $builder->output();
        // die;      
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("Home.Register.register");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    

    public function store(Request $request)
    {

            $data=$request->except(['repassword','_token','code']);
            $data['status']="0";
            $data['token']=str_random(50);
            $data['password']=Hash::make($data['password']);
            $data['username']="admin".rand(1,10000);
            // dd($data);
            if(User::create($data)){
                //存到session中
                session(['username'=>$data['username']]);
                return redirect("/home")->with('success','注册成功');
            }else{
                return back()->with('error','注册失败');
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

    //校验手机号是否被注册
    public function checkphone(Request $request){
        //获取注册的手机号
        $p=$request->input("p");
        //获取数据表的phone字段值
        $data=User::pluck("phone");
        $pp=array();
        //转换为一维数组
        foreach($data as $key=>$value){
            $pp[$key]=$value;
        }
        if(in_array($p,$pp)){
            //手机号已经被注册
            echo 1;
        }else{
            //手机号可用
            echo 0;
        }
    }

    //获取手机校验码
    public function sendphone(Request $request){
        $pp=$request->input("pp");
        // echo $pp;
        // 调用短信接口
        sendsphone($pp);
    }

    //检测手机校验码
    public function checkcode(Request $request){
        //输入的验证码
        $code=$request->input("code");

        //如果发送了验证码..做验证
        if(isset($_COOKIE['fcode']) && !empty($code)){
            //获取手机接收的码
            $fcode=$request->cookie("fcode");
            if($fcode==$code){
                echo 1;//验证码没问题
            }else{
                echo 2;//验证码有问题
            }
        }elseif(empty($code)){
            echo 3;//输入的校验码是空的
        }else{
            echo 4;//校验码过期了
        }
    }

//检测校验码
    public function checkcode1(Request $request){
        //输入的验证码
        $code=$request->input("code1");
         // dd($code);
         //获取系统校验码
        $vcode=session("vcode");
        // echo $code.":".$vcode;die;
        //判断session和输入的验证码不为空的时候,否则为空的时候
        if($request->session()->has('vcode') && !empty($code)){
            if($vcode==$code){
                echo 1;//校验码没问题
            }else{
                echo 2;//校验码有问题
            }
        }elseif(empty($code)){
            echo 3;//输入的校验码是空的
        }else{
            echo 4;//校验码过期了
        }
    }


    //检测用户名
    public function checkname(Request $request){
       //  //输入的用户名
        $name=$request->input("bb");
       
        //获取数据库会员字段
        $database=User::pluck("username");
       //echo $database;
        $cc=array();
        //转换为一维数组
        foreach($database as $key=>$value){
            $cc[$key]=$value;
        }
        if(in_array($name,$cc)){
            echo 1;//用户名已经被注册
        }else{
            echo 0;//用户名可用
        }
       // echo 1111;
    }

    //检测邮箱
    public function checkemail(Request $request){
        //输入的邮箱
        $email=$request->input("uu");
        // echo $email;
        //获取数据库邮箱字段
        $emails=User::pluck("email");

        $mm=array();
        //转换为一维数组
        foreach($emails as $key=>$value){
            $mm[$key]=$value;
        }
        if(in_array($email,$mm)){
            echo 1;//邮箱已经被注册
        }else{
            echo 0;//邮箱地址可用
        }
    }
}
