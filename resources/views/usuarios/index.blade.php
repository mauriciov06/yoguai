@extends('layouts.admin')

@section('content')
	<div class="sub-nav-item">
		<i class="fa fa-user fa-2x" aria-hidden="true"></i>  <h4>Listado de Usuarios</h4>
	</div>

	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
	{!!Form::model(Request::all(), ['route'=>'usuarios.index', 'method'=>'GET', 'role'=>'search'])!!}
	  <div class="input-group search_filter">
	    @include('search.search_usuario')
	    <span class="input-group-btn">
        {!!Form::submit('Buscar',['class'=>'btn btn-search'])!!}
      </span>
	  </div>
	{!!Form::close()!!}
	</div>

	<div class="users">
		<table class="table table-sty">
			<thead>
				<th>Nombre Completo</th>
				<th>Correo Electronico</th>
				<th>Telefono/Celular</th>
				<th>Ciudad</th>
				<th>Acciones</th>
			</thead>
			@foreach($users as $user)
			<tbody>
				<td class="first-item-table">
					<img src="/avatares/{{$user->avatar}}" class="img-circle resize-img" alt="">
					{{$user->name}}
				</td>
				<td>{{$user->email}}</td>
				<td>{{$user->tele_movil}}</td>
				<td>
				<?php 
					$ciudads = json_decode($ciudades, true);
					foreach ($ciudads as $id_ciudad => $nombreCiudad) {
						if($id_ciudad == $user->id_ciudad){
							echo $nombreCiudad;
						}
					}
				?>
				</td>
				<td>
					{!!link_to_route('usuarios.edit', $title = 'Editar', $parameters = $user->id, $attributes = ['class'=>'btn btn-primary'])!!}
					<div style="display: inline-block;">
						{!!Form::open(['route'=> ['usuarios.destroy', $user->id], 'method'=>'DELETE'])!!}
						{!!Form::submit('Eliminar',['class'=>'btn btn-danger'])!!}
						{!!Form::close()!!}
					</div>
				</td>
			</tbody>
			@endforeach
		</table>
		{!!$users->appends(Request::only(['nombre_usuario','correo_usuario','ciudad_usuario']))->render()!!}
	</div>
@stop