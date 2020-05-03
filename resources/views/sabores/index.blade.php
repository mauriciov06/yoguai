@extends('layouts.admin')

@section('content')
	<div class="sub-nav-item">
		<i class="fa fa-bookmark fa-2x" aria-hidden="true"></i>  <h4>Listado de Sabores</h4>
	</div>

	<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-md-offset-3 col-lg-offset-3">
	{!!Form::model(Request::all(), ['route'=>'sabores.index', 'method'=>'GET', 'role'=>'search'])!!}
	  <div class="input-group search_filter">
	    @include('search.search_sabores')
	    <span class="input-group-btn">
        {!!Form::submit('Buscar',['class'=>'btn btn-search'])!!}
      </span>
	  </div>
	{!!Form::close()!!}
	</div>

	<div class="sabores">
		<table class="table table-sty">
			<thead>
				<th style="text-align: left;">Nombre de Sabor</th>
				<th>Estado</th>
				<th>Acciones</th>
			</thead>
			@foreach($sabores as $sabor)
			<tbody>
				<td class="first-item-table">{{$sabor->nombre_sabor}}</td>
				<td>{{$sabor->estado_sabor}}</td>
				<td>
					{!!link_to_route('sabores.edit', $title = 'Editar', $parameters = $sabor->id, $attributes = ['class'=>'btn btn-primary'])!!}
					<div style="display: inline-block;">
						{!!Form::open(['route'=> ['sabores.destroy', $sabor->id], 'method'=>'DELETE'])!!}
						{!!Form::submit('Eliminar',['class'=>'btn btn-danger'])!!}
						{!!Form::close()!!}
					</div>
				</td>
			</tbody>
			@endforeach
		</table>
		{!!$sabores->appends(Request::only(['nombre_sabor','estado_sabor']))->render()!!}
	</div>
@stop