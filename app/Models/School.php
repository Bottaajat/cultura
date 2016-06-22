<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class School extends Model
{

  protected $fillable = [
        'name', 'src'
  ];

	public function users()
	{
		return $this->hasMany('App\Models\User');
	}

  public function exercise() {
    return $this->hasMany('App\Models\Exercise');
  }

  public function video() {
    return $this->hasMany('App\Models\Video');
  }
  
  public function tasks()
  {
    return $this->hasManyThrough('App\Models\Task', 'App\Models\Exercise');
  }

}
