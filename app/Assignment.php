<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    public function task()
	{
		return $this->belongsTo('App\Task');
	}
}
