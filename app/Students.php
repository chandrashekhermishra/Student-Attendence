<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Students extends Model
{
	 protected $table = 'students';
    protected $fillable=['class_id','section_id','roll_no','student_name','fathers_name','mobile','address'];

}





