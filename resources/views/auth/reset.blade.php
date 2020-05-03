@extends('app')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-md-offset-4 col-lg-offset-4">
			<div class="panel panel-default" style="margin-top: 120px;">
				<div class="panel-heading">Restablecer Contraseña</div>
				<div class="panel-body">
					@if (count($errors) > 0)
						<div class="alert alert-danger">
							<strong>¡Ups! </strong> Hubo algunos problemas con su entrada.<br><br>
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif

					<form role="form" method="POST" action="{{ url('/password/reset') }}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<input type="hidden" name="token" value="{{ $token }}">

						<div class="form-group">
							<label class="control-label">Correo Electronico</label>
							<input type="email" class="form-control" name="email" value="{{ old('email') }}">
						</div>

						<div class="form-group">
							<label class="control-label">Contraseña</label>
							<input type="password" class="form-control" name="password">
						</div>

						<div class="form-group">
							<label class="control-label">Confirmar Contraseña</label>
							<input type="password" class="form-control" name="password_confirmation">
						</div>

						<div class="form-group">
							<button type="submit" class="btn btn-primary">
									Restablecer Contraseña
								</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
