<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banner = DB::table("banner")->get();
        return view("Admin.Banner.index",["banner"=>$banner,'i'=>1]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = DB::table("banner_item")->where("banner_id","=",$id)->get();
        $arr = array();
        foreach($data as $value){
            $arr[] = $value->img_id;
        }

        $image = DB::table("image")->whereIn("id",$arr)->get();

        return view("Admin.Banner.banner",['image'=>$image,'data'=>$data,'i'=>1,'a'=>1]);
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
    //添加轮播图图片
    public function banneradd(Request $request,$id){
        $name = $request->input("name");
        $products = DB::table("product")->where("name","like","%".$name."%")->get();
        return view("Admin.Banner.banneradd",["products"=>$products,'i'=>1,'name'=>$name,'id'=>$id]);
    }
    //商品图片
    public function info($bid,$pid){
        //$bid是轮播图id $pid是商品id
        //获取商品图片
        $image = DB::table("image")->where("product_id","=",$pid)->get();
        //获取商品的主级id
        $cate = DB::table("product")->where("id","=",$pid)->first();
        $path = DB::table("cates")->where("id","=",$cate->cates_id)->first();
        $arr = explode(",",$path->path);
        $cid = $arr['1'];
        //获取banner_item的img_id
        $banner = DB::table("banner_item")->where("banner_id","=",$bid)->get();
        $imgid = array();
        foreach ($banner as $value){
            $imgid[] = $value->img_id;
        }
        return view("Admin.Banner.info",['image'=>$image,'pid'=>$pid,'cid'=>$cid,'bid'=>$bid,'i'=>1,'a'=>1,"imgid"=>$imgid]);
    }
    //商品图片置顶添加
    public function top(Request $request){
        $data = $request->except(["pid"]);
        $data['status'] = 0;
        if(DB::table("banner_item")->insert($data)){
           echo 1;
        }else{
            echo 2;
        }
    }
    //商品图片置顶
    public function top1(Request $request){
        $id = $request->input(["id"]);
        if(DB::table("banner_item")->where("id","=",$id)->update(["status"=>1])){
            echo 1;
        }else{
            echo 2;
        }
    }
    //商品图片取消置顶
    public function notop(Request $request){
        $id = $request->input(["id"]);

        if(DB::table("banner_item")->where("id","=",$id)->update(["status"=>0])){
            echo 1;
        }else{
            echo 2;
        }

    }
}
