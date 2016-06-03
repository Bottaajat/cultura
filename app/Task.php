<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [ 'name' ];
	
	public function exercise()
	{
		return $this->belongsTo('App\Exercise');
	}
	
	public function assignment()
	{
			return $this->hasOne('App\Assignment');
	}
	
	public function orderings()
	{
			return $this->hasMany('App\Ordering');
	}
	
	public function orderings()
	{
			return $this->hasMany('App\MultipleChoice');
	}	
}
