<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class CatesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public static function getcates(){
        $cates = DB::table("cates")->select(DB::raw("*,concat(path,',',id)as paths"))->orderBy("paths")->get();
        foreach($cates as $value){
            $arr  = explode(',',$value->path);
            $num =  count($arr)-1;
            $value->name  = str_repeat("--|",$num).$value->name;
        }
        return $cates;
    }
    public function index(Request $request)
    {
        $name = $request->input('name');

        $cates = DB::table("cates")->select(DB::raw("*,concat(path,',',id)as paths"))->orderBy("paths")->where("name","like","%".$name."%")->get();
        foreach($cates as $value){
            $arr  = explode(',',$value->path);
            $num =  count($arr)-1;
            $value->name  = str_repeat("--|",$num).$value->name;
        }
        return view("Admin.Cates.index",['cates'=>$cates,'name'=>$name,'i'=>1]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cates = self::getcates();
        return view("Admin.Cates.add",['cates'=>$cates]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->except(['_token']);
        $id = $data['pid'];
        if($data['pid'] == 0){
            //添加的是主级分类
            $data['path'] = "0";

        }else{
            //添加的是次级分类
            //获取父级信息
            $parent =  DB::table("cates")->where("id","=",$id)->first();
            $data['path'] = $parent->path.",".$parent->id;

        }
        if (DB::table("cates")->insert($data)){
            return redirect("/admincates")->with("success","添加成功");
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
        $info = DB::table("cates")->where("id","=",$id)->first();
        $cates = self::getcates();
        return view("Admin.Cates.edit",['cates'=>$cates,'info'=>$info]);
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
       //获取表单信息
       $data = $request->except(["_method","_token"]);
        //判断pid是否为0,是则是父级否则是子级
        if($data['pid']==0){
            //修改为父级
                //修改字段
            $data['pid'] = 0;
            $data['path'] = "0";

            if(DB::table("cates")->where("id","=",$id)->update($data)){
                return redirect("/admincates")->with("success","修改成功");
            }else{
                return back()->with("error","修改失败");
            }
        }else{
            //修改为子级
                //获取父级信息
            $parent = DB::table("cates")->where("id","=",$data['pid'])->first();
                //修改字段
            $data['pid'] = $parent->id;
            $data['path'] = $parent->path.",".$parent->id;
                //修改数据
            if(DB::table("cates")->where("id","=",$id)->update($data)){
                return redirect("/admincates")->with("success","修改成功");
            }else{
                return back()->with("error","修改失败");
            }
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
        $num =  DB::table("cates")->where("pid","=",$id)->count();
        if($num > 0){
            return back()->with("warning","下面还有人哦！");
        }else{
            if(DB::table("cates")->where("id","=",$id)->delete()){
                return redirect("/admincates")->with("success","删除成功");
            }else{
                return redirect("/admincates")->with("error","删除成功");
            }
        }
    }
}
