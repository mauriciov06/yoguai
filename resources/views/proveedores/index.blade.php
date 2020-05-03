@extends('layouts.admin')

@section('content')
	<div class="sub-nav-item">
		<i class="fa fa-users fa-2x" aria-hidden="true"></i>  <h4>Listado de Proveedores</h4>
	</div>

	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
	{!!Form::model(Request::all(), ['route'=>'proveedores.index', 'method'=>'GET', 'role'=>'search'])!!}
	  <div class="input-group search_filter">
	    @include('search.search_proveedores')
	    <span class="input-group-btn">
        {!!Form::submit('Buscar',['class'=>'btn btn-search'])!!}
      </span>
	  </div>
	{!!Form::close()!!}
	</div>

	<div class="proveedores">
		<table class="table table-sty">
			<thead>
				<th>Nombre Proveedor</th>
				<th>Correo Electronico</th>
				<th>Telefono/Celular</th>
				<th>Dirección</th>
				<th>Ciudad</th>
				<th>Producto Ofrece</th>
				<th>Precio Producto</th>
				<th>Observaciones</th>
				<th>Acciones</th>
			</thead>
			@foreach($proveedors as $proveedor)
			<tbody>
				<td class="first-item-table">{{$proveedor->nombre_proveedor}}</td>
				<td>{{$proveedor->correo_proveedor}}</td>
				<td>{{$proveedor->tel_cel_proveedor}}</td>
				<td>{{$proveedor->direccion_proveedor}}</td>
				<td>
				<?php 
					$ciudads = json_decode($ciudades, true);
					foreach ($ciudads as $id_ciudad => $nombreCiudad) {
						if($id_ciudad == $proveedor->ciudad_proveedor){
							echo $nombreCiudad;
						}
					}
				?>
				</td>
				<td>{{$proveedor->producto_ofrece}}</td>
				<td>{{$proveedor->precio_producto}}</td>
				<td>{{$proveedor->observaciones}}</td>
				<td>
					{!!link_to_route('proveedores.edit', $title = 'Editar', $parameters = $proveedor->id, $attributes = ['class'=>'btn btn-primary'])!!}
					<div style="display: inline-block;">
						{!!Form::open(['route'=> ['proveedores.destroy', $proveedor->id], 'method'=>'DELETE'])!!}
						{!!Form::submit('Eliminar',['class'=>'btn btn-danger'])!!}
						{!!Form::close()!!}
					</div>
				</td>
			</tbody>
			@endforeach
		</table>
		{!!$proveedors->appends(Request::only(['nombre_proveedor','nombre_producto','ciudad_proveedor']))->render()!!}
	</div>
@stop