<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class TareaRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
            'evaluacion_id' => 'required',
            'tarea' => 'required',
            'tipo' => 'required',
            'proyecto' => 'required',
            'horas' => 'required',
            'minutos' => 'required',
            'descripcion' => 'required',
        ];
    }
}
