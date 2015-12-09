<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Administrativo extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'administrativos';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre','puesto','email'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['nombre','puesto','email','created_at','updated_at'];


}
