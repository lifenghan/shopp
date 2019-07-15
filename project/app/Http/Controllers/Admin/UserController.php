<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
//哈希加密
use Hash;
//导入模型类
use App\Models\Admin\User;
//导入校验请求类
use App\Http\Requests\UserInsertRequest;
use DB;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        //获取数据总条数
        $tot=User::count();
        //每页显示的数据数
        $rev=4;
        //获取最大页数
        $maxpage=ceil($tot/$rev);
        //获取ajax传递的参数
        $page=$request->input('page');
        // echo $page;
        if(empty($page)){
            $page=1;
        }

        //获取偏移量
        $offset=($page-1)*$rev;
        //执行sql语句
        $data=User::offset($offset)->limit($rev)->get();

        //判断当前请求是否是ajax请求
        if($request->ajax()){
            // echo $page;die;
            return view("Admin.User.ajaxpage",['data'=>$data]);
        }
        // echo $maxpage;
        for($i=1;$i<$maxpage;$i++){
            $pp[$i]=$i;
        }
        // dd($pp);
        //加载模板
        return view("Admin.User.index",['pp'=>$pp,'data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //加载添加模板
        return view("Admin.User.add");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserInsertRequest $request)
    {
        //处理添加的方法
        // echo "1";
        $data=$request->except(['repassword','_token']);
        //加密密码
        $data['password']=Hash::make($data['password']);
        $data['status']="0";
        $data['token']=str_random(50);
        // dd($data);
        // 执行数据库插入操作 模型写法
        if(User::create($data)){
            //设置session
            return redirect("/adminuser")->with("success","添加成功");
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
         //调用关联数据  会员信息
        $info=User::find($id)->info;
        // dd($info);
        //加载模板
        return view("Admin.User.info",['info'=>$info]);        
    }

    //获取会员的收货地址
    public function address($id){
        $address=User::find($id)->address;
        // dd($address);
        //加载模板 分配数据
        return view("Admin.User.address",['address'=>$address]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         //获取需要修改的数据
        $data=User::find($id);
        //dd($data);
        //加载模板
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
         //获取修改的数据
        // dd($request->all());
        $data=$request->except(['_token','_method']);
        //执行修改
        if(DB::table("user")->where("id","=",$id)->update($data)){
            return redirect("/adminuser")->with("success","修改成功");
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
        //直接删除
        if(User::where("id","=",$id)->delete()){
            return redirect("/adminuser")->with("success","删除成功");
        }else{
            return redirect("/adminuser")->with("error","删除失败");
        }
    }
}
