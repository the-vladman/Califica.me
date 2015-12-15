<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proyecto extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'proyectos';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre','url_logo','progreso','descripcion','tipo','area','end'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */

    protected $hidden = ['nombre','url_logo','progreso','descripcion','tipo','area','end'];


    public function becarios()
    {
        return $this->belongsToMany('App\Becario');
    }

    
    public function recursos(){
        return $this->hasMany('App\Proyecto_archivo');
    }
}
