<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstname', 'lastname','is_admin','email','phone','intro','password', 'src'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

	  public function school()
    {
        return $this->belongsTo('App\Models\School');
    }

  	public function name() {
      return $this->firstname . " " . $this->lastname;
  	}

}
