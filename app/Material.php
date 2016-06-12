<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class Material extends Model
{
    use SoftDeletes;

     /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'materials';
    
    protected $fillable = [ 'label', 'type', 'contents', 'src'];

    protected $dates = ['deleted_at'];

	  public function exercise()
    {
        return $this->belongsTo('App\Exercise');
    }

    
}
