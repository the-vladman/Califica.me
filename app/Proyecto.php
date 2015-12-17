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
    protected $fillable = ['nombre','url_logo','progreso','integrantes','max_integrantes','descripcion','tipo','area','start','end'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */

    protected $hidden = ['nombre','url_logo','progreso','integrantes','max_integrantes','descripcion','tipo','area','start','end'];


    public function becarios()
    {
        return $this->belongsToMany('App\Becario','b_ps','proyecto_id','becario_id');
    }

    
    public function recursos(){
        return $this->hasMany('App\Proyecto_archivo');
    }
}
