<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class PedidoUpdateRequest extends Request
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
            'id_producto' => 'required',
            'estado' => 'required',
            'fecha_pedido' => 'required|date',
            'cantidad' => 'required',
            'id_sabor' => 'required',
            'total' => 'required'
        ];
    }
}
