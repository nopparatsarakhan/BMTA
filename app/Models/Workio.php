<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Workio extends Model
{
    //
    protected $fillable = ['id','e_id','workdate','workin','workout','status_day','comment']; 
}
