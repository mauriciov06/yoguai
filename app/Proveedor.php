<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Proveedor extends Model
{
    use SoftDeletes;

    protected $table = 'proveedors';
    protected $dates = ['deleted_at'];

    protected $fillable = ['nombre_proveedor', 'correo_proveedor', 'tel_cel_proveedor', 'direccion_proveedor', 'ciudad_proveedor', 'producto_ofrece', 'precio_producto', 'observaciones'];

    public function scopeBusquedaProveedor($query, $name, $name_produc, $ciudad){
      if(trim($name) != ''){
        return $query->where('nombre_proveedor', 'LIKE', "%$name%");
      }elseif(trim($name_produc) != ''){
        return $query->where('producto_ofrece', 'LIKE', "%$name_produc%");
      }elseif($ciudad != ''){
        return $query->where('ciudad_proveedor', $ciudad);
      }
    }
}
