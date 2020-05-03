@extends('layouts.admin')

@section('content')
	<div class="sub-nav-item">
		<i class="fa fa-th-list fa-2x" aria-hidden="true"></i>  <h4>Editar Pedido</h4>
	</div>
	<div id="conten-form">
		{!!Form::model($pedido, ['route'=> ['pedidos.update', $pedido->id], 'method'=>'PUT'])!!}
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div class="content-title">
				<h2>Pedido #{!!$pedido->codigo_pedido!!}</h2>
			</div>
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
					<input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
					<div class="form-group">
						{!!Form::label('Producto:')!!}
						{!!Form::select('id_producto', $productos ,null,['class'=>'form-control', 'placeholder'=>'Seleccionar Producto', 'id'=>'id_producto', 'id'=>'id_producto'])!!}
						<input type="hidden" id="valor_producto" value="">
					</div>
					<div class="form-group">
						{!!Form::label('Cantidad:')!!}
						{!!Form::text('cantidad',null,['class'=>'form-control cantidad', 'placeholder'=>'Cantidad', 'id'=>'cantidad'])!!}
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
					<div class="form-group">
						{!!Form::label('Estado del pedido:')!!}
						{!!Form::select('estado', $estadopedido,null,['class'=>'form-control', 'placeholder'=>'Seleccionar Estado'])!!}
					</div>
					<div class="form-group">
						{!!Form::label('Sabor:')!!}
						{!!Form::select('id_sabor', $sabores,null,['class'=>'form-control', 'placeholder'=>'Seleccionar Sabor', 'id'=>'id_sabor'])!!}
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
					<div class="form-group">
						{!!Form::label('Fecha del Pedido:')!!}
						{!!Form::text('fecha_pedido',null,['class'=>'form-control', 'placeholder'=>'Fecha del pedido'])!!}
					</div>
					<div class="form-group">
						<div class="content-valor">
							{!!Form::label('valor_pagar', 'Valor a Pagar:')!!}
							<div id="text_valor">{!!$pedido->total!!}</div>
							<input type="hidden" id="valor_pagar" name="total" value="{!!$pedido->total!!}">
						</div>
					</div>
				</div>
			</div>
			<div id="mensaje-request"></div>
		</div>
		<div class="content_btn_accion" style="text-align: center;display: inline-block;width: 100%;">
			{!!Form::submit('Actualizar',['class'=>'btn btn-accion'])!!}
		</div>
		{!!Form::close()!!}
	</div>

@stop

{!!Html::script('js/jquery.min.js')!!}
{!!Html::script('js/script-pedido.js')!!}