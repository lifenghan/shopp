<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
// 导入组件类
use Intervention\Image\ImageManager;
use Config;
use App\Services\OSS;
use Illuminate\Support\Facades\Redis;
use App\Models\Article;
class PosterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {   
        $data = DB::table('poster')->get();
        // dd($data);
        return view("Admin.Poster.index",['data'=>$data]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $data = DB::table('product')->get();
        // dd($data);
        return view("Admin.Poster.add",['data'=>$data]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        // 
        $data = $request->except("_token");
        $a=DB::table("product")->where('id','=',$data['pid'])->first();
        $data['name']=$a->name;
        // dd($data);
        $url = './poster/'.date("Y-m-d")."/";
        if($request->hasFile("img")){
            $name=time();
            // 获取图片后缀名
            $ext=$request->file("img")->getClientOriginalExtension();
            // 图片移动
            $request->file("img")->move($url,$name.".".$ext);
            // 图片剪切
            $manager = new ImageManager();
            // 图片剪切上传
            $manager->make($url.$name.".".$ext)->resize(1200,100)->save($url."R_".$name.".".$ext);
            unlink($url.$name.".".$ext);
            // 封装图片
            $data['img']=$url."R_".$name.".".$ext;
            if(DB::table("poster")->insert($data)){
                return redirect("/adminposter")->with("success","添加成功");
            }else{
                return back()->with("error","添加失败");
            }
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
        $data = DB::table('product')->get();
        $info = DB::table("poster")->where("pid","=",$id)->first();
        return view("Admin.Poster.edit",['info'=>$info,'data'=>$data]);
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
        $data = $request->except(["_token","_method"]);
        // dd($data);
        if($request->hasFile("img")){
            $a=DB::table("product")->where('id','=',$data['pid'])->first();
        $data['name']=$a->name;
        // dd($data);
        $url = './poster/'.date("Y-m-d")."/";
        if($request->hasFile("img")){
            $name=time();
            // 获取图片后缀名
            $ext=$request->file("img")->getClientOriginalExtension();
            // 图片移动
            $request->file("img")->move($url,$name.".".$ext);
            // 图片剪切
            $manager = new ImageManager();
            // 图片剪切上传
            $manager->make($url.$name.".".$ext)->resize(1200,100)->save($url."R_".$name.".".$ext);
            // 删除原图
            unlink($url.$name.".".$ext);
            // 封装图片
            $data['img']=$url."R_".$name.".".$ext;
            // 老图片删除
            $info = DB::table("poster")->where("pid",'=',$id)->first();
            unlink($info->img);
        }
        }
        if(DB::table("poster")->where("pid","=",$id)->update($data)){
            return redirect("/adminposter")->with("success","修改成功");
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
        if($info = DB::table("poster")->where("pid",'=',$id)->first()){
            unlink($info->img);
            if(DB::table("poster")->where("pid","=",$id)->delete()){
                return redirect("/adminposter")->with("success","删除成功");
            }else{
                return redirect("/adminposter")->with("error","删除成功");
            }
        }
        
    }
}
