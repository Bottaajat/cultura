<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Exercise extends Model
{
	protected $table = 'exercises';

  protected $fillable = [ 'name' ];

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
}
