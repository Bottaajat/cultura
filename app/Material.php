<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
     /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'materials';
    // label = tunniste, type = tyyppi, contents = sisältö
    protected $fillable = [ 'label', 'type', 'contents' ];
	
	public function exercise()
    {
        return $this->belongsTo('App\Exercise');
    }
}
