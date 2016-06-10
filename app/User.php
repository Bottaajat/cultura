<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstname', 'lastname','is_admin','email','phone','intro'
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
        return $this->belongsTo('App\School');
    }

  	public function name() {
      return $this->firstname . " " . $this->lastname;
  	}
  	
    public function validator() {
		return Validator::make(
			$this->getAttributes(),
			array('firstname' => 'required',
			      'lastname' => 'required',
			      'email' => 'required|email|unique:users',
			      'phone' => 'between:8,12'),
			array('firstname.required' => 'Anna etunimi.',
            'lastname.required' => 'Anna sukunimi.',
            'email.email' => 'Sähköpostiosoitteen täytyy olla kelvollinen.',
            'position.required' => 'Anna puhelinnumero.',
            'username.unique' => 'Sähköpostiosoite on varattu.'
      ));
  	}
  	

}
