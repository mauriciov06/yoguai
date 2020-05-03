<!DOCTYPE html>
<html>
  <head>
    <title>Yoguai</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    {!!Html::style('css/website.css')!!}
    {!!Html::style('css/bootstrap.min.css')!!}
    {!!Html::style('css/owl.carousel.min.css')!!}
    {!!Html::style('css/owl.theme.default.css')!!}
    {!!Html::style('css/font-awesome.min.css')!!}
    

  </head>
  <body>
    <div class="nav-header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-4">
            <a class="navbar-brand" href="{!!URL::to('/')!!}">
              <img style="width: 27%;position: relative;top: -9px;" src="/imagenes/logo_yoguai_official.png" alt="">
            </a>
          </div>
          <div class="col-md-4 pull-right">
            @if (Auth::guest())
              <ul class="menu-right">
                <li><a href="{!!URL::to('/registrarme')!!}">Registrarme</a></li>
                <li><a href="{!!URL::to('/iniciar-sesion')!!}">Entrar</a></li>
              </ul>  
            @else
              <ul class="menu-aguest-right">
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="padding-top: 8px;padding-bottom: 7px;">
                    <img src="/avatares/{!!Auth::user()->avatar!!}" width="30" height="30" class="img-circle">  
                    {!!Auth::user()->name!!} <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <div class="media">
                      <div class="media-left">
                        <img src="/avatares/{!!Auth::user()->avatar!!}" width="80" height="80" class="media-object" style="border-radius: 10px;">
                      </div>
                      <div class="media-body">
                        <p>Bienvenido, <strong>{!!Auth::user()->name!!}</strong></p>
                        {!!link_to_route('profile.edit', $title = 'Ver Perfil', $parameters = Auth::user()->id, $attributes = null)!!}
                      </div>
                    </div>
                    <li><a href="{!!URL::to('/admin')!!}">Ir al Admin</a></li>
                    <li><a href="{!!URL::to('/logout')!!}">Cerrar Sesion</a></li>
                  </ul>
                </li>
              </ul>
            @endif
          </div>
        </div>
      </div> 
    </div>

		@yield('content')

	<!-- Scripts -->
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
</body>
</html>
