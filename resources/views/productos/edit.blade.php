@extends('layouts.admin')

@section('content')
	<div class="sub-nav-item">
		<i class="fa fa-cubes fa-2x" aria-hidden="true"></i>  <h4>Editar Producto</h4>
	</div>
	<div id="conten-form">
		{!!Form::model($producto, ['route'=> ['productos.update', $producto->id], 'method'=>'PUT'])!!}
		<div class="row">
			@include('productos.forms.prt')
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				{!!Form::submit('Actualizar',['class'=>'btn btn-accion'])!!}
			</div>
		</div>
		{!!Form::close()!!}
	</div>
@stop