<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Yoguai Admin</title>
    
    {!!Html::style('css/admin.css')!!}
    {!!Html::style('css/dashboard.css')!!}
    {!!Html::style('css/bootstrap.min.css')!!}
    {!!Html::style('css/metisMenu.min.css')!!}
    {!!Html::style('css/sb-admin-2.css')!!}
    {!!Html::style('css/font-awesome.min.css')!!}
    
</head>

<body>
    
  <nav class="navbar navbar-default navbar-fixed-top navbar-sty-top">
    <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
          <span class="sr-only">Menú</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="{!!URL::to('/')!!}">
          <img class="logo-admin" src="/imagenes/logo_yoguai_official.png" alt="">
        </a>
      </div>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right menu-aguest-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="padding-top: 9px;padding-bottom: 9px;background: transparent;">
            <img src="/avatares/{!!Auth::user()->avatar!!}" width="50" height="50" class="img-circle">  
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
            <li><a href="{!!URL::to('/')!!}">Ir a pagina principal</a></li>
            <li><a href="{!!URL::to('/logout')!!}">Cerrar Sesion</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </nav>

  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-3 col-md-2 sidebar">
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
          <div class="navbar-default sidebar" role="navigation" id="nav-bar">
            <div class="sidebar-nav navbar-collapse">
              <ul class="nav" id="side-menu">
                @if(Auth::user()->tipo_cuenta == 1)
                <li class="active">
                  <a href="#"><i class="fa fa-user fa-2x" aria-hidden="true"></i> <h6>Usuarios</h6><span class="fa arrow"></span></a>
                  <ul class="nav nav-second-level">
                    <li>
                      <a href="{!!URL::to('/usuarios/create')!!}"><h6>Agregar Usuario</h6></a>
                    </li>
                    <li>
                      <a href="{!!URL::to('/usuarios')!!}"><h6>Listar Usuarios</h6> <div class="badge">{{$numUser}}</div>
                      </a>
                    </li>
                  </ul>
                </li>
                <li>
                  <a href="#"><i class="fa fa-users fa-2x" aria-hidden="true"></i> <h6>Clientes</h6><span class="fa arrow"></span></a>
                  <ul class="nav nav-second-level">
                    <li>
                      <a href="{!!URL::to('/clientes/create')!!}"><h6>Agregar Cliente</h6></a>
                    </li>
                    <li>
                      <a href="{!!URL::to('/clientes')!!}"><h6>Listar Clientes</h6> <div class="badge">{{$numCliente}}</div></a>
                    </li>
                  </ul>
                </li>
                <li>
                  <a href="#"><i class="fa fa-bookmark fa-2x" aria-hidden="true"></i> <h6>Sabores</h6><span class="fa arrow"></span></a>
                  <ul class="nav nav-second-level">
                    <li>
                      <a href="{!!URL::to('/sabores/create')!!}"><h6>Agregar Sabor</h6></a>
                    </li>
                    <li>
                      <a href="{!!URL::to('/sabores')!!}"><h6>Listar Sabores</h6> <div class="badge">{{$numSabr}}</div></a>
                    </li>
                  </ul>
                </li>
                <li>
                  <a href="#"><i class="fa fa-cubes fa-2x" aria-hidden="true"></i> <h6>Productos</h6><span class="fa arrow"></span></a>
                  <ul class="nav nav-second-level">
                    <li>
                      <a href="{!!URL::to('/productos/create')!!}"><h6>Agregar Producto</h6></a>
                    </li>
                    <li>
                      <a href="{!!URL::to('/productos')!!}"><h6>Listar Productos</h6> <div class="badge">{{$numProd}}</div></a>
                    </li>
                  </ul>
                </li>
                <li>
                  <a href="#"><i class="fa fa-users fa-2x" aria-hidden="true"></i> <h6>Proveedores</h6><span class="fa arrow"></span></a>
                  <ul class="nav nav-second-level">
                    <li>
                      <a href="{!!URL::to('/proveedores/create')!!}"><h6>Agregar Proveedor</h6></a>
                    </li>
                    <li>
                      <a href="{!!URL::to('/proveedores')!!}"><h6>Listar Proveedores</h6> <div class="badge">{{$numProve}}</div></a>
                    </li>
                  </ul>
                </li>
                @endif
                <li>
                  <a href="#"><i class="fa fa-th-list fa-2x" aria-hidden="true"></i> <h6>Pedidos</h6><span class="fa arrow"></span></a>
                  <ul class="nav nav-second-level">
                    <li>
                      <a href="{!!URL::to('/?solicitar_pedido=true')!!}">Agregar Pedido</a>
                    </li>
                    <li>
                      <a href="{!!URL::to('/pedidos')!!}"><h6>Listar Pedidos</h6> <div class="badge">{{$numPedi}}</div></a>
                    </li>
                  </ul>
                </li>
              </ul>
            </div>
          </div>
        </nav>
      </div>

      <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main content-right-main">
        @include('alerts.sucess')
        @include('alerts.request')
        <div class="content-main">
          @yield('content')
        </div>
      </div>
    </div>
  </div>
  

  {!!Html::script('js/jquery.min.js')!!}
  {!!Html::script('js/bootstrap.min.js')!!}
  {!!Html::script('js/metisMenu.min.js')!!}
  {!!Html::script('js/sb-admin-2.js')!!}

  @section('scripts')
  @show

</body>

</html>
