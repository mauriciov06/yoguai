{!!Form::text('nombre_sabor',null,['id'=>'nombre_sabor', 'class'=>'form-control', 'placeholder'=>"Nombre del sabor"])!!}
{!!Form::select('estado_sabor',['publicado'=>'Publicado','despublicado'=>'Despublicado'], null, ['id'=>'estado_sabor', 'class'=>'form-control', 'placeholder'=>"Seleccionar estado"])!!}