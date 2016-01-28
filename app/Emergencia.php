<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Emergencia extends Model
{
/**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'emergencias';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre','apellido_p','apellido_m','telefono'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['nombre','apellido_p','apellido_m','telefono','created_at','updated_at'];

public function becario()
    {
        return $this->belongsTo('App\Becario');
    }
}
