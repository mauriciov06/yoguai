{!!Form::text('nombre_proveedor',null,['id'=>'nombre_prov', 'class'=>'form-control', 'placeholder'=>"Nombre del proveedor"])!!}
{!!Form::text('nombre_producto',null,['id'=>'nombre_prod', 'class'=>'form-control', 'placeholder'=>"Nombre del producto"])!!}
{!!Form::select('ciudad_proveedor',$ciudades, null, ['id'=>'ciudad_prov', 'class'=>'form-control', 'placeholder'=>"Seleccionar ciudad"])!!}