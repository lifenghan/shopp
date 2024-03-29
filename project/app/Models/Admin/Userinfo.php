<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Userinfo extends Model
{
    //与模型关联的数据表
    protected $table = 'user_info';
    //主键
	protected $primaryKey="id";
    //是否开启自动维护时间戳 false 不开启 true 开启
    public $timestamps = false;
}
