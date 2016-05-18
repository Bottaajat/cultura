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
	
	public function tasks()
    {
        return $this->hasMany('App\Task');
    }
	
	public function materials()
	{
		return $this->hasMany('App\Material');
	}
}
