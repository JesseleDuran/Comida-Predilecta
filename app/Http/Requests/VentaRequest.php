<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VentaRequest extends FormRequest
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

            'subtotal'=> 'required', 
            'iva'=> 'required',
            'total' => 'required',
            'forma_pago'=> 'required',
            'llevar'=> 'required',
            'id_cliente'=> 'required',
            'ci_user'=> 'required',
        ];
    }
}
