<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Models\Friends;
class AdminfriendsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        $name = $request->input('name');
        $friends=DB::table("friends")->where("name","like","%".$name."%")->get();

        return view("Admin.Friends.index",["name"=>$name,"friends"=>$friends]);
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
        $data = DB::table("friends")->where("id",'=',$id)->first();
        // dd($data);
        return view("Admin.Friends.update",['data'=>$data]);
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
        $data = $request->except('_method','_token');
        if(DB::table('friends')->where('id','=',$id)->update($data)){
            return redirect("/adminfriends")->with("success","修改成功");
        }else{
            return back()->with("error","修改失败");
        }
        dd($friends);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(DB::table("friends")->where("id","=",$id)->delete()){
            return redirect("/adminfriends")->with("success","删除成功");
        }else{
            return back()->with("error","删除失败");
        }
    }
}
