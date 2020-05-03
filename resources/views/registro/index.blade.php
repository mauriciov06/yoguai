<!DOCTYPE html>
<html>
  <head>
    <title>Yoguai - Registro</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    {!!Html::style('css/website.css')!!}
    {!!Html::style('css/bootstrap.min.css')!!}
    

  </head>
  <body class="body-regsitro">
    <div class="absol-ini-sesion">
      ¿Ya tienes una cuenta? <a href="{!!URL::to('/iniciar-sesion')!!}"> Iniciar Sesion</a>
    </div>
    <div class="container-fluid">
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
          <div class="content-registro">
            <a href="{!!URL::to('/')!!}">
              <img class="img-responsive" src="/imagenes/logo_yoguai_official.png" alt="">
            </a>
            {!!Form::open(['route'=>'registrarme.store', 'method'=>'POST', 'files'=>true])!!}
            <div class="row">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            @include('alerts.sucess')
            @include('alerts.request-registro')
              @include('registro.forms.rgs')
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                  {!!Form::submit('Registrarme',['class'=>'btn btn-registro'])!!}
                  <p class="text-terminos">Al registrarte estas aceptando los terminos y condiciones de Yoguai</p>
                </div>
            </div>
            {!!Form::close()!!}
          </div>
        </div>
      </div>
    </div>

    {!!Html::script('js/jquery.min.js')!!}
    {!!Html::script('js/bootstrap.min.js')!!}
  </body>
</html>