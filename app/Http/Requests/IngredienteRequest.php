<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class IngredienteRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */

    /*todos pueden hacer este request*/
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */

    /*los que son requeridos ajuro, y con resrtricciones*/
    public function rules()
    {
        return [

            'nombre' => 'required',
            'cantidad' => 'required',
            'precio' => 'required',
        ];
    }
}
