<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UpdateProyectoRequest extends Request
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
            'nombre'=>'required',
            'imagen' => 'image',
            'progreso' => 'numeric',
            'tipo' => 'required',
            'area' => 'required',
            'end' => 'required',
            'descripcion' => 'required'
        ];
    }
}
