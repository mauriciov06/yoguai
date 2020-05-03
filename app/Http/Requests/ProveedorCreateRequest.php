<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ProveedorCreateRequest extends Request
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
            'nombre_proveedor' => 'required',
            'correo_proveedor' => 'required|unique:proveedors',
            'tel_cel_proveedor' => 'required|numeric|min:7',
            'direccion_proveedor' => 'required',
            'ciudad_proveedor' => 'required',
            'producto_ofrece' => 'required',
            'precio_producto' => 'required|numeric',
            'observaciones' => 'required'
        ];
    }
}
