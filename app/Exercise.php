<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exercise extends Model
{
    protected $fillable = [ 'name' ];
	
	
	public function exercise_level()
	{
		return $this->belongsTo('App\ExerciseLevel');
	}
	
}
