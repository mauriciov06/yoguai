<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sabor extends Model
{
    use SoftDeletes;

    protected $table = 'sabors';
    protected $dates = ['deleted_at'];

    protected $fillable = ['nombre_sabor', 'estado_sabor'];

    public function scopeBusquedaSabor($query, $name, $estado){
      if(trim($name) != ''){
        return $query->where('nombre_sabor', 'LIKE', "%$name%");
      }elseif($estado != ''){
        return $query->where('estado_sabor', $estado);
      }
    }
}
