@extends('layouts.admin')

@section('content')
	<div class="sub-nav-item">
		<i class="fa fa-bookmark fa-2x" aria-hidden="true"></i>  <h4>Agregar Sabor</h4>
	</div>
	<div id="conten-form">	
		{!!Form::open(['route'=>'sabores.store', 'method'=>'POST'])!!}
		<div class="row">
			@include('sabores.forms.sbr')
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					{!!Form::submit('Agregar Sabor',['class'=>'btn btn-accion'])!!}
				</div>
		</div>
		{!!Form::close()!!}
	</div>
@stop
