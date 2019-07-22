<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\Productinfo;
use App\Models\Admin\Product;
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

    public function index(Request $request)
    {
        $name = $request->input('name');
        $products = DB::table("product")->where("name","like","%".$name."%")->get();
        return view("Admin.Product.index",['products'=>$products,'i'=>1,'name'=>$name]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cates = DB::table("cates")->select(DB::raw("*,concat(path,',',id)as paths"))->orderBy("paths")->get();
        foreach($cates as $value){
            $arr = explode(",",$value->path);
            $num = count($arr)-1;
            $value->name = str_repeat("--|",$num).$value->name;
        }
        return view("Admin.Product.add",['cates'=>$cates]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //判断是否有文件上传(主图)
        $a = "";
        if($request->hasFile('main_img')){
            //获取文件文件后缀
            $ext = $request->file("main_img")->getClientOriginalExtension();
            //初始化文件名
            $name = time().rand(1,10000).".".$ext;
            $a = $name;
            //添加到指定文件
            $request->file("main_img")->move("./static/Public/images/".date("Y-m-d"),$name);
        }
        $data = $request->except(["_token","imgs"]);
        $data['main_img'] = date("Y-m-d")."/".$a;
        $cate = $request->input('cates_id');
        if($cate == 0 ){
            return back()->with("error","请选择所属类型哦亲")->withInput();
        }else{
            if(DB::table("product")->insert($data)){
                return redirect("/adminproduct")->with("success","添加成功");
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
    //商品详情信息
    public function show($id)
    {
        //获取商品属性信息
        $info = Product::find($id)->info;
        //获取商品信息
        $product = Product::find($id);
        //获取商品参考图片
        $imgs = Product::find($id)->imgs;

        return view("Admin.Product.info",['info'=>$info,'product'=>$product,'imgs'=>$imgs]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $info = Product::find($id)->info;
        $product = Product::find($id);
        return view("Admin.Product.edit",["info"=>$info,"product"=>$product]);
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
        //判断是否有图片上传
        $a = "";
        if($request->hasFile("main_img")){
            //获取文件后缀
            $ext = $request->file("main_img")->getClientOriginalExtension();
            //初始化名
            $name = time().rand(1,10000).".".$ext;
            $a = $name;
            //放入文件内
            $request->file("main_img")->move("./static/Public/images/".date("Y-m-d"),$name);
        }
        //获取修改product_property表的信息
        $product_property = $request->except(["_token","_method","name","price","stock","main_img","summary"]);
        //获取修改product表的信息
        $str = array();
        foreach($product_property as $key=>$value){
            //修改product_property表
            $result = DB::table("product_property")->where("id","=",$key)->update(['detail'=>$value]);
           $str[] = $key;
        }
        $str[] = "_method";
        $str[] = "_token";
        $product = $request->except($str);
        $product['main_img'] = date("Y-m-d")."/".$a;
        //修改product表
//        dd($product);
        $res = DB::table("product")->where("id","=",$id)->update($product);
        return redirect("/adminproduct")->with("success","修改成功");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(DB::table("product")->where("id","=",$id)->update(["delete_time"=>time()])){
            return redirect("/adminproduct")->with("success","删除成功");
        }else{
            return back()->with("error","删除失败");
        }
    }
    //添加商品信息
    public function addinfo($id){
        return view("Admin.Product.addinfo",['id'=>$id]);
    }
    //添加商品信息执行
    public function doaddinfo(Productinfo $request,$id){
        $data = $request->except(['_token']);
        $data['product_id'] = $id;
        if(\App\Models\Admin\ProductInfo::create($data)){
            return redirect("/adminproduct")->with("success","添加成功");
        }else{
            return back()->with("error","添加失败")->withInput();
        }
    }
    //删除商品信息
    public function deleteinfo(Request $request,$id){
        $pid = $request->input('id');
        if(DB::table("product_property")->where("id","=",$pid)->update(['delete_time'=>time()])){
            return redirect("/adminproduct/".$id)->with("删除成功");
        }else{
            return back()->with("删除失败");
        }
    }
}
