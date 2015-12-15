<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proyecto_archivo extends Model
{
      /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'proyecto_archivos';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre','url_archivo'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */

    protected $hidden = ['nombre','url_archivo'];


}
