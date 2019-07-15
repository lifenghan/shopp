<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class address extends Model
{
    protected $table = "address";
    protected $primaryKye = "id";
    public  $timestamps = false;
    protected $fillable = ['name','phone','users_id','huo'];
}
