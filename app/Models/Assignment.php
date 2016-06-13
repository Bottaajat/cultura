<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    public function task()
	{
		return $this->belongsTo('App\Models\Task');
	}
}
