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
class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {   
        // $data = DB::table('articles')->get();
        // return view("Admin.Article.index",['data'=>$data]);
        
        //定义一个变量，存储公告的列表的记录
        $arts=[];
        //链表名字 存储每条数据的id
        $listKey='List:php216slist';
        //哈希表 存储公告列表数据
        $hasKey='HASH:php216hash';
        if(Redis::exists($listKey)){
            //获取所有的id
            $lists=Redis::lrange($listKey,0,-1);
            //遍历id
            foreach($lists as $k=>$v){
                //根据获取到的id值获取哈希表中的公告数据
                $arts[]=Redis::hgetall($hasKey.$v);
            }

        }else{
            //缓存服务器没有数据
            //先从数据库获取数据 给缓存服务器一份
            $arts=Article::get()->toArray();
            foreach($arts as $k=>$v){
                //把数据的id存储在链表里
                Redis::rpush($listKey,$v['id']);
                //把数据存储在哈希表
                Redis::hmset($hasKey.$v['id'],$v);
            }
            

        }
       
        return view("Admin.Article.index",['article'=>$arts]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("Admin.Article.add");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->except("_token");

        // if($request->hasFile("thumb")){
        //     $name=time();
        //     // 获取图片后缀名
        //     $ext=$request->file("thumb")->getClientOriginalExtension();
        //     // 图片移动
        //     $request->file("thumb")->move(Config::get('app.app_upload'),$name.".".$ext);
        //     // 图片剪切
        //     $manager = new ImageManager();
        //     // 图片剪切上传
        //     $manager->make(Config::get('app.app_upload').$name.".".$ext)->resize(100,100)->save(Config::get('app.app_upload')."R_".$name.".".$ext);

        //     // 封装图片
        //     $data['thumb']=Config::get('app.app_upload')."R_".$name.".".$ext;
        //     if(DB::table("articles")->insert($data)){
        //         return redirect("/adminarticle")->with("success","添加成功");
        //     }else{
        //         return back()->with("error","添加失败");
        //     }
        // }
        if($request->hasFile("thumb")){
            $file=$request->file("thumb");
            $name=time();
            // 获取图片后缀名
            $ext=$request->file("thumb")->getClientOriginalExtension();
           $newfile=$name.".".$ext;
           $filepath=$file->getRealPath();
           // oss上传
           // $newfile上传到阿里云oss平台下的文件名字
           // $filepath 临时资源
           OSS::upload($newfile,$filepath);
            // 图片剪切
            $manager = new ImageManager();
            if (!file_exists(Config::get('app.app_upload'))){
                mkdir(Config::get('app.app_upload'));
            }
            
            // 图片剪切上传
            $manager->make(env('ALIURL').$name.".".$ext)->resize(100,100)->save(Config::get('app.app_upload')."R_".$name.".".$ext);

            // 封装图片
            $data['thumb']=Config::get('app.app_upload')."R_".$name.".".$ext;
            $id = DB::table("articles")->insertGetId($data);
            if($id){
                $data['id']=$id;
                //添加的同时把添加的数据存储在缓存服务器里
                //链表名字 存储每条数据的id
                $listKey='List:php216slist';
                //哈希表 存储公告列表数据
                $hasKey='HASH:php216hash';
                //把添加的数据的id存储在链表里
                Redis::rpush($listKey,$id);
                //把数据添加到哈希表里
                Redis::hmset($hasKey.$id,$data);
                return redirect("/adminarticle")->with("success","添加成功");
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
        $info = DB::table("articles")->where("id","=",$id)->first();
        return view("Admin.Article.edit",['info'=>$info]);
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
        if($request->hasFile("thumb")){
            $file=$request->file("thumb");
            $name=time();
            // 获取图片后缀名
            $ext=$request->file("thumb")->getClientOriginalExtension();
           $newfile=$name.".".$ext;
           $filepath=$file->getRealPath();
           // oss上传
           // $newfile上传到阿里云oss平台下的文件名字
           // $filepath 临时资源
           OSS::upload($newfile,$filepath);
            // 图片剪切
            $manager = new ImageManager();
            if (!file_exists(Config::get('app.app_upload'))){
                mkdir(Config::get('app.app_upload'));
            }
            
            // 图片剪切上传
            $manager->make(env('ALIURL').$name.".".$ext)->resize(100,100)->save(Config::get('app.app_upload')."R_".$name.".".$ext);
            // 封装图片
            $data['thumb']=Config::get('app.app_upload')."R_".$name.".".$ext;
            // 老图片删除
            $info = DB::table("articles")->where("id",'=',$id)->first();
            unlink($info->thumb);
        }
        if(DB::table("articles")->where("id","=",$id)->update($data)){
            //哈希表 存储公告列表数据
            $hasKey='HASH:php216hash';
            //把数据添加到哈希表里
            Redis::hmset($hasKey.$id,$data);
            return redirect("/adminarticle")->with("success","修改成功");
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
        if($info = DB::table("articles")->where("id",'=',$id)->first()){
            unlink($info->thumb);
            if(DB::table("articles")->where("id","=",$id)->delete()){
                //链表名字 存储每条数据的id
                $listKey='List:php216slist';
                //哈希表 存储公告列表数据
                $hasKey='HASH:php216hash';
                //删除哈希表的数据
                Redis::del($hasKey.$id);
                //删除链表id
                Redis::lrem($listKey,0,$id);
                return redirect("/adminarticle")->with("success","删除成功");
            }else{
                return redirect("/adminarticle")->with("error","删除成功");
            }
        }
        
    }
}
