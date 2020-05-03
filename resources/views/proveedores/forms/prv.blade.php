<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
	<div class="form-group">
		{!!Form::label('Nombre del Proveedor:')!!}
		{!!Form::text('nombre_proveedor',null,['class'=>'form-control'])!!}
	</div>
</div>
<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
	<div class="form-group">
		{!!Form::label('Correo Electronico:')!!}
		{!!Form::email('correo_proveedor',null,['class'=>'form-control'])!!}
	</div>
</div>
<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
	<div class="form-group">
		{!!Form::label('Celular/Telefono:')!!}
		{!!Form::text('tel_cel_proveedor',null,['class'=>'form-control'])!!}
	</div>
</div>
<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
	<div class="form-group">
		{!!Form::label('Dirección:')!!}
		{!!Form::text('direccion_proveedor',null,['class'=>'form-control'])!!}
	</div>
</div>
<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
	<div class="form-group">
		{!!Form::label('Ciudad:')!!}
		{!!Form::select('ciudad_proveedor',$ciudad, null,['class'=>'form-control'])!!}
	</div>
</div>
<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
	<div class="form-group">
		{!!Form::label('Producto que Ofrece:')!!}
		{!!Form::text('producto_ofrece',null,['class'=>'form-control'])!!}
	</div>
</div>
<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
	<div class="form-group">
		{!!Form::label('Precio del Producto:')!!}
		{!!Form::text('precio_producto',null,['class'=>'form-control'])!!}
	</div>
</div>
<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
	<div class="form-group">
		{!!Form::label('Observaciones:')!!}
		{!!Form::textarea('observaciones',null,['class'=>'form-control', 'rows'=>'4'])!!}
	</div>
</div>

