<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class PersonalRequest extends Request
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
            'id_becario' => 'required',
            'nombres' => 'required',
            'apellido_p' => 'required',
            'apellido_m' => 'required',
            'telefono' => 'required',
            'descripcion' => 'required',
            'email' => 'required',
            'sangre' => 'required',
            'genero' => 'required',
            'area' => 'required',
            'imagen' => 'image'
            ];
    }
}
