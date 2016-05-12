<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exercise extends Model
{
    protected $fillable = [ 'name' ];
	
	public static function getPossibleLevels()
	{
	  $type = DB::select( DB::raw("SHOW COLUMNS FROM exercises WHERE Field = 'level'") )[0]->Type;
	  preg_match('/^enum\((.*)\)$/', $type, $matches);
	  $enum = array();
	  foreach( explode(',', $matches[1]) as $value )
	  {
		$v = trim( $value, "'" );
		$enum = array_add($enum, $v, $v);
	  }
	  return $enum;
	}
	
}
