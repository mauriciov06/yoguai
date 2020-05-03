<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class Pedido extends Model
{
    use SoftDeletes;

    protected $table = 'pedidos';
    protected $dates = ['deleted_at'];

    protected $fillable = ['codigo_pedido', 'id_producto', 'cantidad', 'fecha_pedido', 'id_sabor', 'estado', 'total', 'id_usuario'];

    public function scopeBusquedaPedido($query, $codigo, $fecha_ini, $fecha_fin, $estado){
      if(trim($codigo) != ''){
        return $query->where('codigo_pedido', 'LIKE', "%$codigo%");
      }elseif($fecha_ini != '' || $fecha_fin != ''){
        //return $query->where('fecha_pedido', 'LIKE', '%$fecha_ini% AND %$fecha_fin%');
      }elseif($estado != ''){
        return $query->where('estado', $estado);
      }
    }
}
