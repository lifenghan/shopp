<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $id = $request->input('id');
        return view("Admin.Product.imgs",['id'=>$id]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id = $request->input('id');
        //判断文件是否上传
        if($request->hasFile('main_img')){
            //获取文件文件后缀
            $ext = $request->file("main_img")->getClientOriginalExtension();
            //初始化文件名
            $name = time().rand(1,10000).".".$ext;
            //添加到指定文件
            $request->file("main_img")->move("./static/Public/images/".date("Y-m-d"),$name);
            $data = array();
            $data['url'] =date("Y-m-d")."/".$name;
            $data['product_id'] = $id;
            if(DB::table("image")->insert($data)){
                return redirect("/adminproduct/".$id)->with("success","添加成功");
            }else{
                return back()->with("error","添加失败");
            }
        }else{
            return back()->with("error","请选择图片");
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
        if(DB::table("image")->where("product_id","=",$id)->update(['delete_time'=>time()])){
            return redirect("/adminproduct/".$id)->with("success","删除成功");
        }else{
            return back()->with("error","删除失败");
        }
    }
}
