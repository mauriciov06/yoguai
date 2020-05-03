@extends('layouts.admin')

@section('content')
	<div class="sub-nav-item">
		<i class="fa fa-th-list fa-2x" aria-hidden="true"></i>  <h4>Listado de Pedidos</h4>
	</div>

	<div class="col-xs-12 col-sm-12 col-md-7 col-lg-7 col-md-offset-2 col-lg-offset-2">
	{!!Form::model(Request::all(), ['route'=>'pedidos.index', 'method'=>'GET', 'role'=>'search'])!!}
	  <div class="input-group search_filter">
	    @include('search.search_pedido')
	    <span class="input-group-btn">
        {!!Form::submit('Buscar',['class'=>'btn btn-search'])!!}
      </span>
	  </div>
	{!!Form::close()!!}
	</div>

	<div class="pedidos">
		<table class="table table-sty">
			<thead>
				<th># Codigo</th>
				<th>Producto</th>
				<th>Cantidad</th>
				<th>Fecha de Pedido</th>
				<th>Sabor</th>
				<th>Estado</th>
				<th>Total</th>
				@if(Auth::user()->tipo_cuenta == 1)
					<th>Accion</th>
				@endif
			</thead>
			@foreach($pedidos as $pedido)
			<tbody>
				<td class="first-item-table">{{$pedido->codigo_pedido	}}</td>
				<td>
					<?php 
						$products = json_decode($productos, true);
						foreach ($products as $id_producto => $nombre_producto) {
							if($id_producto == $pedido->id_producto){
								echo $nombre_producto;
							}
						}
					?>
				</td>
				<td>{{$pedido->cantidad}}</td>
				<td>{{$pedido->fecha_pedido}}</td>
				<td>
					<?php 
						$sabors = json_decode($sabores, true);
						foreach ($sabors as $id_sabor => $nombre_sabor) {
							if($id_sabor == $pedido->id_sabor){
								echo $nombre_sabor;
							}
						}
					?>
				</td>
				<td>
					<?php 
						foreach ($estadospedidos as $estadospedido) {
							$array_estados = json_decode($estadospedido, true);
							if($array_estados['id'] == $pedido->estado){ ?>
								<div class="bage <?php echo $array_estados['class_color']; ?>">
									<?php echo $array_estados['nombre_estado']; ?>
								</div>
							<?php }
						} 
					?>
				</td>
				<td>{{$pedido->total}}</td>
				@if(Auth::user()->tipo_cuenta == 1)
					<td>
						<a href="#" data-idreservante="<?php echo $pedido->id_usuario; ?>" class="btn btn-success ver_reservante" data-toggle="modal" data-target="#modalReservante">Ver</a>
						{!!link_to_route('pedidos.edit', $title = 'Editar', $parameters = $pedido->id, $attributes = ['class'=>'btn btn-primary'])!!}
						<div style="display: inline-block;">
							{!!Form::open(['route'=> ['pedidos.destroy', $pedido->id], 'method'=>'DELETE'])!!}
							{!!Form::submit('Eliminar',['class'=>'btn btn-danger'])!!}
							{!!Form::close()!!}
						</div>
					</td>
				@endif
			</tbody>
			@endforeach
		</table>
		{!!$pedidos->appends(Request::all())->render()!!}
	</div>
@stop

@include('pedidos.modal-reservante')

@section('scripts')
	{!!Html::script('js/script.js')!!}
@endsection