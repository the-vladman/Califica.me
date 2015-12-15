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
    protected $fillable = ['nombres','apellido_p','apellido_m','genero','area','sangre','descripcion','email','telefono'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */

    protected $hidden = ['nombres','apellido_p','apellido_m','genero','area','sangre','fecha_ingreso','descripcion','email','telefono'];


    public function proyectos()
    {
        return $this->belongsToMany('App\Proyecto');
    }

    public function emergencia(){
        return $this->hasOne('App\Emergencia');
    }

    public function direccion(){
        return $this->hasOne('App\Direccion');
    }

    public function academicas(){
        return $this->hasMany('App\Academica');
    }

    public function habilidades(){
        return $this->hasOne('App\Habilidad');
    }
}
