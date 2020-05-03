<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
	<div class="form-group" style="text-align: center;">
		<output id="list" style="padding: 7px 0 7px 0 !important;">
		<?php if(!empty($user)){ ?>
			<img class="thumb" src="/avatares/{!!$user->avatar!!}" alt="">
		<?php } ?>
		</output>
		<input type="file" name="avatar" id="files" class="inputfile inputfile-1" />
		<label for="avatar"><span>Seleccionar avatar</span></label>
	</div>
</div>
<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
	<div class="form-group">
		{!!Form::label('Nombre:')!!}
		{!!Form::text('name',null,['class'=>'form-control'])!!}
	</div>
</div>
<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
	<div class="form-group">
		{!!Form::label('Correo Electronico:')!!}
		{!!Form::email('email',null,['class'=>'form-control'])!!}
	</div>
</div>
<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
	<div class="form-group">
		{!!Form::label('Dirección:')!!}
		{!!Form::text('direccion',null,['class'=>'form-control'])!!}
	</div>
</div>
<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
	<div class="form-group">
		{!!Form::label('Celular/Telefono:')!!}
		{!!Form::text('tele_movil',null,['class'=>'form-control'])!!}
	</div>
</div>
<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
	<div class="form-group">
		{!!Form::label('Ciudad:')!!}
		{!!Form::select('id_ciudad',$ciudad, null,['class'=>'form-control'])!!}
	</div>
</div>
{!!Form::hidden('tipo_cuenta','1')!!}
<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
	<div class="form-group">
		{!!Form::label('Contraseña:')!!}
		{!!Form::password('password',['class'=>'form-control'])!!}
	</div>
</div>
