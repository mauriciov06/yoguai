{!!Form::open(['route'=>'pedidos.store', 'method'=>'POST'])!!}
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
	@if (Auth::guest())
		<div class="content-title">
			<h2>¿Quien hace el pedido?</h2>
		</div>
		<div class="row">
			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
				<div class="form-group">
					{!!Form::text('name',null,['class'=>'form-control', 'placeholder'=>'Nombre Completo', 'id'=> 'name' ])!!}
				</div>
				<div class="form-group">
					{!!Form::text('tel_cel',null,['class'=>'form-control', 'placeholder'=>'Telefono/Celular', 'id'=>'tel_cel' ])!!}
				</div>
				<div class="form-group">
					{!!Form::text('direccion',null,['class'=>'form-control', 'placeholder'=>'Dirección', 'id'=>'direccion' ])!!}
				</div>
			</div>
			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
				<div class="form-group">
					{!!Form::text('correo',null,['class'=>'form-control', 'placeholder'=>'Correo Electronico', 'id'=>'correo'])!!}
				</div>
				<div class="form-group">
					{!!Form::select('ciudad', $ciudades ,null,['class'=>'form-control', 'placeholder'=>'Seleccionar Ciudad', 'id'=>'ciudad'])!!}
				</div>
			</div>
		</div>
	@endif
	<div class="content-title">
		<h2>Información del Producto</h2>
	</div>
	<div class="row">
		<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
			<input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
			<div class="form-group">
				{!!Form::select('id_producto', $productos ,null,['class'=>'form-control', 'placeholder'=>'Seleccionar Producto', 'id'=>'id_producto', 'id'=>'id_producto'])!!}
				<input type="hidden" id="valor_producto" value="">
			</div>
			<div class="form-group">
				{!!Form::text('cantidad',null,['class'=>'form-control cantidad', 'placeholder'=>'Cantidad', 'id'=>'cantidad'])!!}
			</div>
		</div>
		<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
			<div class="form-group">
				{!!Form::select('id_sabor', $sabores,null,['class'=>'form-control', 'placeholder'=>'Seleccionar Sabor', 'id'=>'id_sabor'])!!}
			</div>
			<div class="form-group">
				<div class="content-valor">
					{!!Form::label('valor_pagar', 'Valor a Pagar:')!!}
					<div id="text_valor"></div>
					<input type="hidden" id="valor_pagar" name="total" value="">
				</div>
			</div>
		</div>
	</div>
	<div id="mensaje-request"></div>
	<div id="msj-success" class="alert alert-success alert-dismissible" role="alert" style="display: none;"> 
		Haz realizado un pedido, te contactaremos para veificar tus datos.
	</div>
</div>
<div style="text-align: center;display: inline-block;width: 100%;">
{!!link_to('#', $title='Enviar Pedido', $attributes = ['id'=>'registrar-pedido', 'class'=>'btn btn-enviar-msj'], $secure = null)!!}
</div>
<br>
<div class="alert alert-info" role="alert" style="margin: 5px 15px 20px;">
	<strong>Tener en cuenta que</strong><br>
	<ul style="padding-left: 18px;">
		<li>No se entregan pedidos el mismo dia que se solicita, ya que solamente se entrega los dias de despacho.</li>
		<li>La cantidad minima del pedido via online es de 2.</li>
	</ul>	
</div>
{!!Form::close()!!}

