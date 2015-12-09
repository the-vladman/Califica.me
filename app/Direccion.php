<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Direccion extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'direccions';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['calle','numero','CP','delegacion','estado'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['calle','numero','CP','delegacion','estado'];

}
