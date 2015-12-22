<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BP extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'b_ps';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['becario_id','proyecto_id'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */

    protected $hidden = ['becario_id','proyecto_id'];

    
}
