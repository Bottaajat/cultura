<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class Exercise extends Model
{
	use SoftDeletes;

	protected $table = 'exercises';

  protected $fillable = [ 'name' ];

  protected $dates = ['deleted_at'];

	public function school() {
		return $this->belongsTo('App\Models\School');
	}

	public function topic()
	{
		return $this->belongsTo('App\Models\Topic');
	}

	public function tasks()
  {
    return $this->hasMany('App\Models\Task');
  }

	public function materials()
	{
		return $this->hasMany('App\Models\Material');
	}

	public function glossary()
    {
        return $this->hasOne('App\Models\Glossary');
    }

	public function descriptions()
	{
			return $this->hasOne('App\Models\Description');
	}
}
