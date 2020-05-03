@extends('layouts.admin')

@section('content')
	<div class="sub-nav-item">
		<i class="fa fa-user fa-2x" aria-hidden="true"></i>  <h4>Editar Usuario</h4>
	</div>
	<div id="conten-form">
		{!!Form::model($user, ['route'=> ['usuarios.update', $user->id], 'method'=>'PUT', 'files'=>true])!!}
		<div class="row">
			@include('usuarios.forms.usr')
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				{!!Form::submit('Actualizar',['class'=>'btn btn-accion'])!!}
			</div>
		</div>
		{!!Form::close()!!}
	</div>
@stop

@section('scripts')
	{!!Html::script('js/custom-file-input.js')!!}
	{!!Html::script('js/script.js')!!}
@endsection