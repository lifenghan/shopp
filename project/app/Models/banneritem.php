<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class banneritem extends Model
{
    protected $table = "banner_item";
    protected $primaryKey = "id";
    public $timestamps = false;
    protected $fillable = ['img_id','banner_id','delete_time','created_at','updated_at','type','status'];


}
