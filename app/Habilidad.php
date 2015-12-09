<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Habilidad extends Model
{
        /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'habilidads';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['habilidad'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['habilidad'];

}
