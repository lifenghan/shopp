<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    //与模型关联的数据表
    protected $table = 'user';
    //主键
    protected $primaryKey="id";
    //是否开启自动维护时间戳
    public $timestamps = true;
    //可以被批量赋值的属性
    protected $fillable =['username','password','email','create_at','updated_at','phone','status','token'];

     //修改器 对数据做自动处理 status 字段名 
    public function getStatusAttribute($value){
    	$status=[0=>"禁用",1=>"开启"];
    	return $status[$value];
    }

    //关联  user和userinfo模型类 获取关联数据
    public function info(){
    	return $this->hasOne("App\Models\Admin\Userinfo","users_id");
    }

    //关联 user和useraddress模型类 获取该会员下所有收货地址
    public function address(){
    	return $this->hasMany("App\Models\Admin\Useraddress","users_id");
    }
}
