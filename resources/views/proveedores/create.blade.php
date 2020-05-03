@extends('layouts.admin')

@section('content')
	<div class="sub-nav-item">
		<i class="fa fa-users fa-2x" aria-hidden="true"></i>  <h4>Agregar Proveedor</h4>
	</div>
	<div id="conten-form">	
		{!!Form::open(['route'=>'proveedores.store', 'method'=>'POST'])!!}
		<div class="row">
			@include('proveedores.forms.prv')
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					{!!Form::submit('Agregar Proveedor',['class'=>'btn btn-accion'])!!}
				</div>
		</div>
		{!!Form::close()!!}
	</div>
@stop
