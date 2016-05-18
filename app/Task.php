<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [ 'name' ];
	
	public function exercise_id()
	{
		return $this->belongsTo('App\Exercise');
	}
}
