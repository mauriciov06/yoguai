<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EstadoPedido extends Model
{
    use SoftDeletes;

    protected $table = 'estado_pedidos';
    protected $dates = ['deleted_at'];

    protected $fillable = ['nombre_estado', 'class_color'];

}
