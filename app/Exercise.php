<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class Exercise extends Model
{
	use SoftDeletes;

	protected $table = 'exercises';

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
	
	public function glossary()
    {
        return $this->hasOne('App\Glossary');
    }

	public function descriptions()
	{
			return $this->hasOne('App\Description');
	}
}
