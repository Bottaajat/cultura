<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class Exercise extends Model
{
	use SoftDeletes;

  protected $fillable = [ 'name' ];

  protected $dates = ['deleted_at'];

	public function topic()
	{
		return $this->belongsTo('App\Topic');
	}

	public function tasks()
  {
        return $this->hasMany('App\Task');
  }

	public function materials()
	{
		return $this->hasMany('App\Material');
	}

	public function descriptions()
	{
			return $this->hasMany('App\Description');
	}
}
