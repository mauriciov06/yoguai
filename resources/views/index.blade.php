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
          <div class="col-md-4">
            <ul class="menu-center">
              <li><a href="{!!URL::to('#')!!}" id="item1" class="active">Inicio</a></li>
              <li><a href="{!!URL::to('#sestion-one')!!}" id="item2">Yoguai</a></li>
              <li><a href="{!!URL::to('#sestion-two')!!}" id="item3">Como Funciona</a></li>
              <li><a href="{!!URL::to('#sestion-three')!!}" id="item4">Contacto</a></li>
            </ul>
          </div>
          <div class="col-md-4">
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
    
    <div class="owl-carousel" style="margin-top: 61px;">
      <img src="imagenes/banner1.jpg" alt="" data-toggle="modal" data-target="#modalPedido">
      <img src="imagenes/banner2.jpg" alt="">
      <a href="{!!URL::to('/registrarme')!!}"><img src="imagenes/banner3.jpg" alt=""></a>
    </div>
    
    <div id="sestion-one">
      <h1>¿Que es Yoguai?</h1>
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="row">
          <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
            <div class="conten-text">
              <p>Yoguai es una empresa dedicada a la producción y distribución de yogurt casero 100% natural sin conservantes ni preservativos con la mas alta calidad, ademas de ayudar a la salud de las personas es cremoso y contiene trozos de fruta.  Yoguai nacio en el año 2017 contando con la dedicación de su equipo de trabajo ha logrado tener un impacto a nivel comercial, ademas cuenta con innovacion tecnologia en su sistema de pedidos y presencia en las redes sociales.</p>
              <img src="imagenes/vector1.png" alt="" class="img-responsive vector1">
            </div>
          </div>
          <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6" style="overflow: hidden;">
            <img src="imagenes/yoguai-img1.jpg" alt="" class="img-responsive img1">
          </div>
        </div>
      </div>
    </div>

    <img src="imagenes/separador.png" alt="" class="img-responsive separador-img">

    <div id="sestion-two">
      <h2>Como Funciona</h2>
      <div class="conten-two">
        <span class="left-arrow"></span>
        <p>Completa el formulario del pedido o comunicate a nuestros numero y haz tu compra de forma facil y rapida, paga contraentrega y disfruta de nuestro producto.</p>
        <span class="right-arrow"></span>
      </div>
    </div>

    <img src="imagenes/separador2.png" alt="" class="img-responsive" style="margin-top: -42px;margin-bottom: -53px;z-index: 2;position: relative;">

    <div id="sestion-three">
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="row">
          <div class="col-xs-12 col-sm-6 col-md-5 col-lg-5 col-md-offset-1">
            {!!Form::open(['route'=>'mail.store', 'method'=>'POST', 'id'=>'form-contacto'])!!}
              <h3>Contactenos</h3>
              <p>Completa el formulario de contacto y nuestros asesores se contactaran en el menor tiempo posible.</p>
              <div class="form-group">
                {!!Form::text('name',null,['id'=>'name-contacto','class'=>'form-control', 'placeholder'=>'Nombre Completo'])!!}
              </div>
              <div class="form-group">
                {!!Form::text('correo',null,['id'=>'correo-contacto','class'=>'form-control', 'placeholder'=>'Correo Electronico'])!!}
              </div>
              <div class="form-group">
                {!!Form::text('tel_cel',null,['id'=>'tel_cel-contacto','class'=>'form-control', 'placeholder'=>'Telefono/Celuar'])!!}
              </div>
              <div class="form-group">
                {!!Form::textarea('mensaje',null,['id'=>'mensaje-contacto', 'class'=>'form-control', 'placeholder'=>'Mensaje', 'rows'=>'6'])!!}
              </div>
              <div id="mensaje-contactenos" style="display: none;"></div>
              {!!link_to('#', $title='Enviar Mensaje', $attributes = ['id'=>'btn-contactenos', 'class'=>'btn btn btn-mensaje'], $secure = null)!!}
            {!!Form::close()!!}
          </div>
        </div>
      </div>
    </div>

    <div class="footer-bottom">
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="row">
          <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
            <h3>INFORMACIÓN DE CONTACTO</h3>
            <p>(+57) 318 438 0759</p>
            <p>(032) 656 5065</p>
            <p>Calle 71 # 8a-84 B. 7 de Agosto</p>
            <p>info@yoguai.com</p>
          </div>
          <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
            <h3>ACERCA DE NOSOTROS</h3>
            <ul class="acerca-nosotros">
              <li>
                <a href="#" data-toggle="modal" data-target="#modalPedido">Solicitar Pedido</a>
              </li>
              <li>
                <a href="#">Producción</a>
              </li>
              <li>
                <a href="#">Terminos y Condiciones</a>
              </li>
              <li>
                <a href="#">Policitas de condiciones de datos</a>
              </li>
            </ul>
          </div>
          <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
            <h3>REDES SOCIALES</h3>
            <ul class="redes-sociales">
              <li>
                <a href="https://www.facebook.com/" target="_blank"><i class="ico-fb"></i></a>
              </li>
              <li>
                <a href="https://www.instagram.com/" target="_blank"><i class="ico-inst"></i></a>
              </li>
              <li>
                <a data-toggle="tooltip" data-placement="right" title="Whastsapp: 318 438 0759"><i class="ico-wsp"></i></a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  
    @include('modal')
    
    {!!Html::script('js/jquery.min.js')!!}
    {!!Html::script('js/bootstrap.min.js')!!}
    {!!Html::script('js/owl.carousel.min.js')!!}
    {!!Html::script('js/jquery.scrollTo.min.js')!!}
    {!!Html::script('js/script-owl-show.js')!!}
    {!!Html::script('js/script.js')!!}
      
    @include('validate_modal_pedido')

  </body>
</html>
