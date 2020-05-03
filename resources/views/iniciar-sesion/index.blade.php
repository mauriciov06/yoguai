<!DOCTYPE html>
<html>
  <head>
    <title>Yoguai</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    {!!Html::style('css/website.css')!!}
    {!!Html::style('css/dashboard.css')!!}
    {!!Html::style('css/bootstrap.min.css')!!}
    

  </head>
  <body class="body-login">

    <div class="container-fluid">
      <div class="row">
        <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 sidebar-left">
          <a href="{!!URL::to('/')!!}">
            <img class="img-responsive" src="/imagenes/logo_yoguai_official.png" alt="">
          </a>
          <div class="content-login">
            {!!Form::open(['route'=>'log.store', 'method'=>'POST'])!!}
            <div class="form-group">
              {!!Form::label('Correo Electronico')!!}
              {!!Form::email('email', null,['class'=>'form-control'])!!}
            </div>
            <div class="form-group">
              {!!Form::label('Contraseña')!!}
              {!!Form::password('password', ['class'=>'form-control'])!!}
            </div>
            <div class="form-group sty-in" style="display: block;margin-top: 9px;margin-bottom: 0;text-align: center;">
              {!!link_to('password/email', $title = '¿Olvidaste tu contraseña?', $parameters =null, $attributes = null)!!}
            </div>
            <div class="form-group" style="display: inline-block;width: 100%;margin-bottom: 0;">
              @include('alerts.errors')
            </div>
            {!!Form::submit('Entrar',['class'=>'btn btn-login'])!!}
            {!!Form::close()!!}

            <div class="group-social">
              <a href="https://www.facebook.com/"><i class="ico_facebook"></i></a>
              <a href="https://www.instagram.com/"><i class="ico_instagram"></i></a>
              <a href="tel:3205154360" data-toggle="tooltip" data-placement="right" title="Whastsapp: 320 515 4360 - 311 326 4796"><i class="ico_wsp"></i></a>
            </div>
            <div class="form-group" style="text-align: center;">
              ¿No tienes cuenta?  <a href="{!!URL::to('/registrarme')!!}" style="color:#a10166;font-weight: 600;">Registrate</a>
            </div>
          </div>
          </div>
        <div class="col-xs-12 col-sm-9 col-sm-offset-3 col-md-9 col-lg-9 col-md-offset-3 main-right">
          <img src="/imagenes/banground-login.jpg" class="img-responsive" alt="">
        </div>
      </div>
    </div>

    {!!Html::script('js/jquery.min.js')!!}
    {!!Html::script('js/bootstrap.min.js')!!}
  </body>
</html>