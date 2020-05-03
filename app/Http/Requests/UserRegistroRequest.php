<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UserRegistroRequest extends Request
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
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required|min:6',        
            'tipo_cuenta' => 'required',
            'tele_movil' => 'required|min:7',
            'id_ciudad' => 'required'
        ];
    }
}
