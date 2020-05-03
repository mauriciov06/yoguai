@extends('layouts.admin')

@section('content')
	<div class="sub-nav-item">
		<i class="fa fa-cubes fa-2x" aria-hidden="true"></i>  <h4>Listado de Productos</h4>
	</div>

	<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-md-offset-4 col-lg-offset-4">
	{!!Form::model(Request::all(), ['route'=>'productos.index', 'method'=>'GET', 'role'=>'search'])!!}
	  <div class="input-group search_filter">
	    @include('search.search_producto')
	    <span class="input-group-btn">
        {!!Form::submit('Buscar',['class'=>'btn btn-search'])!!}
      </span>
	  </div>
	{!!Form::close()!!}
	</div>

	<div class="users">
		<table class="table table-sty">
			<thead>
				<th>Nombre Producto</th>
				<th>Cantidades Disponibles</th>
				<th>Valor Producto</th>
				<th>Acciones</th>
			</thead>
			@foreach($productos as $producto)
			<tbody>
				<td class="first-item-table">
					{{$producto->nombre_producto}}
				</td>
				<td>{{$producto->cantidad_disponible}}</td>
				<td>{{$producto->valor_producto}}</td>
				<td>
					{!!link_to_route('productos.edit', $title = 'Editar', $parameters = $producto->id, $attributes = ['class'=>'btn btn-primary'])!!}
					<div style="display: inline-block;">
						{!!Form::open(['route'=> ['productos.destroy', $producto->id], 'method'=>'DELETE'])!!}
						{!!Form::submit('Eliminar',['class'=>'btn btn-danger'])!!}
						{!!Form::close()!!}
					</div>
				</td>
			</tbody>
			@endforeach
		</table>
		{!!$productos->appends(Request::only(['nombre_producto']))->render()!!}
	</div>
@stop