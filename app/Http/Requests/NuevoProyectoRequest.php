<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class NuevoProyectoRequest extends Request
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
            'proyecto' => 'required',
            'maximo' => 'required | numeric',
            'integrante' => 'required|max:8',
            'tipo' => 'required',
            'area' => 'required',

        ];
    }
}
