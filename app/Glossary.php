<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Glossary extends Model
{
    protected $table = 'glossaries';
    protected $fillable = [ 'rus', 'fin'];

	  public function material()
    {
        return $this->belongsTo('App\Material');
    }
}
