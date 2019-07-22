<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Illuminate\View\View;
use Intervention\Image\ImageManager;
use Config;
use App\Services\OSS;
use App\Models\Article;
class FriendsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=DB::table('friends')->where('status','=','1')->get();
        
        return view("Home.Friends.index",['data'=>$data]);
    }

    public function public(view $view){
        
        $friend=DB::table('friends')->where('status','=','1')->get();
        
        $view->with('friend',$friend);
        
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // echo "asd";
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->except('_token');
        foreach($data as $value){
            if(!$value){
                return redirect("/friends")->with("success","请添写全部资料");
            }
        }
        // 图片上传阿里云
        $file=$request->file("img");
        $name=time();
        // 获取图片后缀名
        $ext=$request->file("img")->getClientOriginalExtension();
       $newfile=$name.".".$ext;
       $filepath=$file->getRealPath();
       // oss上传
       // $newfile上传到阿里云oss平台下的文件名字
       // $filepath 临时资源
       OSS::upload($newfile,$filepath);

        $data['img']='https://lhyphp216.oss-cn-beijing.aliyuncs.com/'.$name.".".$ext;
        DB::table("friends")->insert($data);
        return redirect("/friends")->with("success","提交成功,请等待管理员审核");
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
