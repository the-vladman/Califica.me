<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Becario extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'becarios';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['nombres','cid','extras_total','inbursa','apellido_p','apellido_m','genero','area','sangre','descripcion','email','telefono'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */

    protected $hidden = ['nombres','cid','extras_total','inbursa','apellido_p','apellido_m','genero','area','sangre','fecha_ingreso','descripcion','email','telefono'];


    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function proyectos()
    {
        return $this->belongsToMany('App\Proyecto','b_ps','becario_id','proyecto_id');
    }

    public function emergencia(){
        return $this->hasOne('App\Emergencia');
    }

    public function evaluaciones(){
        return $this->hasMany('App\Evaluacion');
    }

    public function direccion(){
        return $this->hasOne('App\Direccion');
    }

    public function academicas(){
        return $this->hasOne('App\Academica');
    }

    public function habilidades(){
        return $this->hasOne('App\Habilidad');
    }
}
