<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //获取商品信息
        $product = DB::table("product")->where("id","=",$id)->first();
        //获取商品所在的二级分类
        $cate = DB::table("cates")->where("id","=",$product->cates_id)->first();
        //获取一级分类
        $cates = DB::table("cates")->where("id","=",$cate->pid)->first();
        //获取主级分类
        $catess = DB::table("cates")->where("id","=",$cates->pid)->first();
        //获取商品参考图片
        $images = DB::table("image")->where("product_id","=",$product->id)->where("delete_time","=",null)->get();
        //获取商品详细信息
        $info = DB::table("product_property")->where("product_id","=",$product->id)->where("delete_time","=",null)->get();
//        var_dump($images);
        return view("/Home.Product.index",['cate'=>$cate,'cates'=>$cates,'catess'=>$catess,'product'=>$product,'images'=>$images,'info'=>$info,'i'=>1]);
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
