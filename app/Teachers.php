<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teachers extends Model
{
	protected $table = 'users';

    
    public function classes()
    {
        return $this->belongsTo('App\Classes','class_id');
    }

    public function sections()
    {
    	return $this->belongsTo('App\Sections','section_id');
    }

}
