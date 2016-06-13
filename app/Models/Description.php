<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Description extends Model
{
     /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'descriptions';
    // label = tunniste, type = tyyppi, contents = sisältö
    protected $fillable = [ 'content' ];

	  public function exercise()
    {
        return $this->belongsTo('App\Models\Exercise');
    }
}
