<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class images extends Model
{
    protected $table = "image";
    protected $primaryKey = "id";
    public $timestamps = true;
    protected $fillable = ['url','product_id','delete_time','created_at','updated_at'];
}
