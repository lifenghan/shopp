<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class Homecontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public static function getCates($pid){
        $cates = DB::table("cates")->where("pid","=",$pid)->get();
        //$data = array();
        foreach($cates as $value){
            $value->suv =   self::getCates($value->id);
            //$data[] = $value;
        }
        return $cates;
    }
    public function index()
    {
      $cates =  self::getCates(0);
      //获取商品
        $product = DB::table("product")->get();
        foreach($product as $value){
            $cate =  DB::table("cates")->where("id","=",$value->cates_id)->first();
            $value->path =  explode(",",$cate->path);
        }
//        获取首页主轮播图
        $banner = DB::table("banner_item")->where("banner_id","=",1)->where("status","=",1)->get();
        $arr = array();
        foreach($banner as $value){
            $arr[] = $value->img_id;
        }
        $image = DB::table("image")->whereIn("id",$arr)->get();
        //获取首页次轮播图
        $banners = DB::table("banner_item")->where("banner_id","=",2)->where("status","=",1)->get();
        $arrs = array();
        foreach($banners as $value){
            $arrs[] = $value->img_id;
        }
        $images = DB::table("image")->whereIn("id",$arrs)->get();
        foreach($images as $value){
            foreach ($banners as $val){
                if($value->id == $val->img_id){
                    $value->type = $val->type;
                }
            }
        }
        // 公告
        $data = DB::table('articles')->get();
        // 广告
        $poster = DB::table('poster')->first();
        return view("Home.Home.index",['cates'=>$cates,'i'=>1,'a'=>1,'product'=>$product,"image"=>$image,"images"=>$images,"data"=>$data,'poster'=>$poster]);
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
        //
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
