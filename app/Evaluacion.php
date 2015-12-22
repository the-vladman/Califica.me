<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evaluacion extends Model
{
        /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'evaluacions';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['start','end','asistencia','extras','eficiencia','constancia','puntualidad','colaboracion','proactividad','ensenanza','me_evaluo'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */

    protected $hidden = ['start','end','asistencia','extras','eficiencia','constancia','puntualidad','colaboracion','proactividad','ensenanza','me_evaluo'];


    public function becario()
    {
        return $this->belongsTo('App\Becario');
    }
    public function tareas()
    {
        return $this->hasMany('App\Tarea');
    }
}
