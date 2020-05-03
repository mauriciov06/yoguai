<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Producto extends Model
{
    use SoftDeletes;

    protected $table = 'productos';
    protected $dates = ['deleted_at'];

    protected $fillable = ['nombre_producto', 'cantidad_disponible', 'valor_producto'];

    public function scopeBusquedaProducto($query, $name){
      if(trim($name) != ''){
        return $query->where('nombre_producto', 'LIKE', "%$name%");
      }
    }
}
