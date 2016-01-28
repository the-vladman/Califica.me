<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Academica extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'academicas';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['universidad','carrera','tipo','status'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['universidad','carrera','tipo','status'];

    public function becario()
    {
        return $this->belongsTo('App\Becario');
    }

    
}
