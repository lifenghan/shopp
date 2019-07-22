<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class ProductInfo extends Model
{
    protected $table = "product_property";
    protected $primaryKey = "id";
    public $timestamps = true;
    protected $fillable = ["name","detail","product_id","delete_time","updated_at","created_at"];
}
