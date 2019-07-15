<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class info extends Model
{
    protected $table="users_info";
    protected $primaryKey = "id";
    public $timestamps = false;
    protected $fillable = ['hobby','sex','users_id'];
}
