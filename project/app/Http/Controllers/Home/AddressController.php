<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class AddressController extends Controller
{
    //获取城市联动
    public function address(Request $request){
        $upid=$request->input("upid");
        $data=DB::table("district")->where("upid","=",$upid)->get();
         echo json_encode($data);
    }

    //设置收货地址默认值
    public function change(Request $request){
    	$address_id=$request->input("address_id");
    	// dd($defaultid);
        $userid=session('username')->id;
        // echo $userid;
          DB::table("user_address")->where("users_id","=",$userid)->update(['default'=>'0']);
    	$data=DB::table("user_address")->where("id","=",$address_id)->first();
       
    	// echo json_encode($data);
    	if($data->default=='0'){
    		DB::table("user_address")->where("id","=",$address_id)->update(['default'=>'1']);
            // echo 1;
    	}
    	
    }
}
