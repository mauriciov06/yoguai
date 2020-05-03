<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-md-offset-4 col-lg-offset-4">
	<div class="form-group">
		{!!Form::label('Nombre del Sabor:')!!}
		{!!Form::text('nombre_sabor',null,['class'=>'form-control'])!!}
	</div>
</div>
<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-md-offset-4 col-lg-offset-4">
	<div class="form-group">
		{!!Form::label('Estado:')!!}
		{!!Form::select('estado_sabor',['publicado'=>'Publicado', 'despublicado'=>'Despublicado'], null,['class'=>'form-control', 'placeholder'=>'Seleccionar estado'])!!}
	</div>
</div>
