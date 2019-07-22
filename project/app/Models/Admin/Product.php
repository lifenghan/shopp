<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = "product";
    protected $primaryKey = "id";
    public $timestamps = true;
    protected $fillable = ['name','price','stock','cates_id','summary','main_img','created_at','updated_at','delete_time'];
    //与商品属性关联
    public function info(){
        return $this->hasMany("App\Models\Admin\productInfo",'product_id');
    }
    //与图片信息关联
    public function imgs(){
        return $this->hasMany("App\Models\Admin\images","product_id");
    }
}
