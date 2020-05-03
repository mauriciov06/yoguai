@extends('layouts.admin')

@section('content')
	<div class="sub-nav-item">
		<i class="fa fa-users fa-2x" aria-hidden="true"></i>  <h4>Editar Proveedor</h4>
	</div>
	<div id="conten-form">
		{!!Form::model($proveedor, ['route'=> ['proveedores.update', $proveedor->id], 'method'=>'PUT'])!!}
		<div class="row">
			@include('proveedores.forms.prv')
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				{!!Form::submit('Actualizar',['class'=>'btn btn-accion'])!!}
			</div>
		</div>
		{!!Form::close()!!}
	</div>
@stop