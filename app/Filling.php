<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Filling extends Model
{
    public function task()
	{
		return $this->belongsTo('App\Task');
	}	
}
