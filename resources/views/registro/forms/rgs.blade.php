<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
	<div class="form-group">
		{!!Form::text('name',null,['class'=>'form-control', 'placeholder'=>'Nombre'])!!}
	</div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
	<div class="form-group">
		{!!Form::email('email',null,['class'=>'form-control', 'placeholder'=>'Correo Electronico'])!!}
	</div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
	<div class="form-group">
		{!!Form::text('tele_movil',null,['class'=>'form-control', 'placeholder'=>'Celular/Telefono'])!!}
	</div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
	<div class="form-group">
		{!!Form::select('id_ciudad',$ciudad, null,['class'=>'form-control', 'placeholder'=>'Seleccionar Ciudad'])!!}
	</div>
</div>
{!!Form::hidden('tipo_cuenta','2')!!}
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
	<div class="form-group">
		{!!Form::password('password',['class'=>'form-control', 'placeholder'=>'Contraseña'])!!}
	</div>
</div>
