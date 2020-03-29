<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    //
    protected $fillable = ['id','emp_id','emp_fname','emp_lname','emp_address','emp_phone','emp_token_line','emp_position','car_id','day_off','salary','check_in','check_out'];
    
}
