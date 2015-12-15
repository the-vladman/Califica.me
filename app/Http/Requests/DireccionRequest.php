<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class DireccionRequest extends Request
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
            'id_direccion' => 'required',
            'calle' => 'required',
            'numero' => 'required',
            'CP' => 'required|max:5|numeric',
            'delegacion' => 'required',
            'estado' => 'required',
        ];
    }
}
