<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attendence extends Model
{
    protected $table = 'attendence_list';
    protected $fillable = ['url', 'description'];
}
