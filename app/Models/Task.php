<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [ 'name' ];

	public function exercise()
	{
		return $this->belongsTo('App\Models\Exercise');
	}

	public function assignment()
	{
			return $this->hasOne('App\Models\Assignment');
	}

	public function orderings()
	{
			return $this->hasMany('App\Models\Ordering');
	}

	public function multiplechoises()
	{
			return $this->hasMany('App\Models\MultipleChoice');
	}

	public function crosswords()
	{
			return $this->hasMany('App\Models\Crossword');
	}

	public function filling()
	{
			return $this->hasOne('App\Models\Filling');
	}

	public function glossary()
	{
			return $this->hasOne('App\Models\Glossary');
	}
}
