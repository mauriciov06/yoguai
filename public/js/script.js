$(document).ready(function() {

  $(".cantidad").change(function() {
    var cantidad = $(".cantidad").val();
    var valorprod = $('#valor_producto').val();    
    totalpagar(cantidad,valorprod);
  });

  //Cargar Valor
  $("#id_producto").change(function() {
    var id = $('#id_producto').val();
    var route = "/productos/"+id;
    var token = $('#token').val();

    $.ajax({
      url: route,
      headers: {'X-CSRF-TOKEN': token},
      type: "POST",
      data: {id:id},
      success: function(response) {
        $('#valor_producto').val(response['valorproducto']);
        var cantidad = $(".cantidad").val();
        totalpagar(cantidad,response['valorproducto']);
      }
    });

  });


  //Mostrar modal de reservante en la seccion de pedidos
  $('.ver_reservante').click(function(e){
    var id = $(this).data("idreservante");
    var route = "/pedidos-reservante/"+id;
    var token = $('#token').val();

    $.ajax({
      url: route,
      headers: {'X-CSRF-TOKEN': token},
      type: "POST",
      data: {id:id},
      success: function(response) {
        $('#name').text(response['inforeservante']['name']);
        $('#email').text(response['inforeservante']['email']);
        $('#tel_movil').text(response['inforeservante']['tele_movil']);
        $('#ciudad').text(response['ciudad']);
        $('#direccion').text(response['inforeservante']['direccion']);
      }
    });

  });

  //Validar Correo
  $("#correo").change(function() {
    var correo = $('#correo').val();
    var route = "/usuarios/"+correo;
    var token = $('#token').val();

    $.ajax({
      url: route,
      headers: {'X-CSRF-TOKEN': token},
      type: "POST",
      data: {correo:correo},
      success: function(response) {
        var msj = '';
        var validate = false;

        if(response['status'] == "false"){
          msj = 'El correo ingresado ya esta en uso, si eres propietario de esta cuenta por favor ingresa y haz tu pedido desde esta en <a href="/iniciar-sesion"><strong>Iniciar sesion</strong></a>.';
          validate = true;
        }else{
          msj = 'El correo ingresado no esta en uso, puedes seguir con su pedido.';
        }

        if(validate){
          $("#mensaje-request").html("<div class='alert alert-danger alert-dismissible' role='alert' style='margin:0;'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>"+ msj +"</div>");
          $('#registrar-pedido').hide();
        }else{
          $('#registrar-pedido').show();
          $("#mensaje-request").html("<div class='alert alert-success alert-dismissible' role='alert' style='margin:0;'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>"+ msj +"</div>");
        }


      }
    });

  });

  $('#btn-contactenos').click(function(e){
    e.preventDefault();

    var name = $('#name-contacto').val();
    var correo = $('#correo-contacto').val();
    var tel_cel = $('#tel_cel-contacto').val();
    var mensaje = $('#mensaje-contacto').val();
    var validate = false;
    var msj_error = '';

    if(name != ''){
      if(correo != ''){
        if(correo.match(/^[A-Za-z0-9-_.+%]+@[A-Za-z0-9-.]+\.[A-Za-z]{2,4}$/)){
          if(tel_cel != ''){
            if(tel_cel.match(/^[0-9\s]+$/)){
              if(mensaje != ''){                
                $('#mensaje-contactenos').fadeIn(1500);
                $("#mensaje-contactenos").html("<div class='alert alert-success alert-dismissible' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button> Mensaje Enviado Correctamente</div>");
                
                setTimeout(function(){ 
                  $('#form-contacto').submit();
                }, 2000);
              }else{
                validate = true;
                msj_error = 'Por favor ingrese su Mensaje.';
              }
            }else{
              validate = true;
              msj_error = 'El Telefono o Celular solo debe contener caracteres numéricos.';
            }
          }else{
            validate = true;
            msj_error = 'Por favor ingrese su Telefono o Celular.';
          }
        }else{
          validate = true;
          msj_error = 'Por favor ingrese un correo electronico valido.';
        }
      }else{
        validate = true;
        msj_error = 'Por favor ingrese su correo electronico.';
      }
    }else{
      validate = true;
      msj_error = 'Por favor ingrese su nombre.';
    }

    if(validate){
      $('#mensaje-contactenos').fadeIn(1500);
      $("#mensaje-contactenos").html("<div class='alert alert-danger alert-dismissible' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>"+ msj_error +"</div>");
    }
    

  });

  $('#registrar-pedido').click(function(e){
    e.preventDefault();

    var nombre_usuario = $('#name').val();
    var tel_cel_usuario = $('#tel_cel').val();
    var direccion_usuario = $('#direccion').val();
    var correo_usuario = $('#correo').val();
    var ciudad_usuario = $('#ciudad').val();

    var id_producto = $('#id_producto').val();
    var cantidad = $('#cantidad').val();
    var id_sabor = $('#id_sabor').val();
    var valor_pagar = $('#valor_pagar').val();

    var route = '/pedidos';
    var token = $('#token').val();
    var validate = false;
    var msj_error = '';
    var defi = false;

    if(typeof (nombre_usuario) == "undefined" && typeof (tel_cel_usuario) == "undefined" &&
      typeof (direccion_usuario) == "undefined" && typeof (correo_usuario) == "undefined" && 
      typeof (ciudad_usuario) == "undefined"){
      defi = true;
    }

    if(!defi){
      if(nombre_usuario != ''){
        if(correo_usuario != ''){
          if(correo_usuario.match(/^[A-Za-z0-9-_.+%]+@[A-Za-z0-9-.]+\.[A-Za-z]{2,4}$/)){
            if(tel_cel_usuario != ''){
              if(tel_cel_usuario.match(/^[0-9\s]+$/)){
                if(ciudad_usuario != ''){
                  if(direccion_usuario != ''){
                    if(id_producto != ''){
                      if(cantidad != ''){
                        if(cantidad.match(/^[0-9\s]+$/)){
                          if(cantidad >= 2){
                            if(id_sabor != ''){
                              $.ajax({
                                url: route,
                                headers: {'X-CSRF-TOKEN': token},
                                type: 'post',
                                dataType: 'json',
                                data:{nombre_usuario:nombre_usuario,tel_cel_usuario:tel_cel_usuario,direccion_usuario:direccion_usuario,correo_usuario:correo_usuario,
                                      ciudad_usuario:ciudad_usuario,id_producto:id_producto,cantidad:cantidad, id_sabor:id_sabor, valor_pagar:valor_pagar  },
                                success:function(){
                                  $('#mensaje-request').fadeOut();
                                  $('#msj-success').fadeIn();
                                  setTimeout('document.location.reload()', 3000);
                                }
                              })
                            }else{
                              validate = true;
                              msj_error = 'Por favor selecciona el sabor.';
                            }
                          }else{
                            validate = true;
                            msj_error = 'La cantidad minima de pedido via online es de 2 unidades.';
                          }
                        }else{
                          validate = true;
                          msj_error = 'El cantidad solo debe contener caracteres numéricos.';
                        }
                      }else{
                        validate = true;
                        msj_error = 'Por favor ingresa la cantidad que deseas pedir.';
                      }
                    }else{
                      validate = true;
                      msj_error = 'Por favor selecciona un producto.';
                    }
                  }else{
                    validate = true;
                    msj_error = 'Por favor ingrese la dirección.';
                  }
                }else{
                  validate = true;
                  msj_error = 'Por favor selecciona la ciudad.';
                }
              }else{
                validate = true;
                msj_error = 'El Telefono/Celular solo debe contener caracteres numéricos.';
              }
            }else{
              validate = true;
              msj_error = 'Por favor ingrese el Telefono/Celular.';      
            }
          }else{
            validate = true;
            msj_error = 'Por favor ingrese un correo valido.';
          }
        }else{
          validate = true;
          msj_error = 'Por favor ingrese el correo electronico.';
        }
      }else{
        validate = true;
        msj_error = 'Por favor ingrese el nombre.';
      }

      if(validate){
        $('#msj-success').fadeOut();
        $('#mensaje-request').fadeIn();
        $("#mensaje-request").html("<div class='alert alert-danger alert-dismissible' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>"+ msj_error +"</div>");
      }
    }else{
      if(id_producto != ''){
        if(cantidad != ''){
          if(cantidad.match(/^[0-9\s]+$/)){
            if(cantidad >= 2){
              if(id_sabor != ''){
                $.ajax({
                  url: route,
                  headers: {'X-CSRF-TOKEN': token},
                  type: 'post',
                  dataType: 'json',
                  data:{id_producto:id_producto,cantidad:cantidad, id_sabor:id_sabor, valor_pagar:valor_pagar  },
                  success:function(){
                    $('#mensaje-request').fadeOut();
                    $('#msj-success').fadeIn();
                    setTimeout('document.location.reload()', 3000);
                  }
                })
              }else{
                validate = true;
                msj_error = 'Por favor selecciona el sabor.';
              }
            }else{
              validate = true;
              msj_error = 'La cantidad minima de pedido via online es de 2 unidades.';
            }
          }else{
            validate = true;
            msj_error = 'El cantidad solo debe contener caracteres numéricos.';
          }
        }else{
          validate = true;
          msj_error = 'Por favor ingresa la cantidad que deseas pedir.';
        }
      }else{
        validate = true;
        msj_error = 'Por favor selecciona un producto.';
      }

      if(validate){
        $('#msj-success').fadeOut();
        $('#mensaje-request').fadeIn();
        $("#mensaje-request").html("<div class='alert alert-danger alert-dismissible' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>"+ msj_error +"</div>");
      }
    }
  })

});

function totalpagar(cantidad, valorprod) {
  var total_pagar = cantidad * valorprod;
  if(isNaN(total_pagar) == false && cantidad !=''){
    if(cantidad >= 2){
      $("#valor_pagar").val(total_pagar);
      $("#text_valor").html('$'+number_format(total_pagar));
      $("#mensaje-request").html('');
      $("#text_valor").fadeIn();
      $("#text_valor").css({'background':'#87ad26'});

      if(cantidad > 1428){
        $(".btn-enviar-msj").css({'margin-top':'40px'});
      }else{
        $(".btn-enviar-msj").css({'margin-top':'10px'});
      } 
    }else{
      $("#text_valor").fadeOut();
      $("#mensaje-request").html("<div class='alert alert-danger alert-dismissible' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button> La cantidad minima de pedido via online es de 2 unidades.</div>");
    }
  }else{
    $("#text_valor").fadeOut();
    $("#mensaje-request").html("<div class='alert alert-danger alert-dismissible' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button> Por favor ingresa un caracter numerico en la Cantidad.</div>");
  }
}


function number_format(amount, decimals) {

    amount += ''; // por si pasan un numero en vez de un string
    amount = parseFloat(amount.replace(/[^0-9\.]/g, '')); // elimino cualquier cosa que no sea numero o punto

    decimals = decimals || 0; // por si la variable no fue fue pasada

    // si no es un numero o es igual a cero retorno el mismo cero
    if (isNaN(amount) || amount === 0) 
        return parseFloat(0).toFixed(decimals);

    // si es mayor o menor que cero retorno el valor formateado como numero
    amount = '' + amount.toFixed(decimals);

    var amount_parts = amount.split('.'),
        regexp = /(\d+)(\d{3})/;

    while (regexp.test(amount_parts[0]))
        amount_parts[0] = amount_parts[0].replace(regexp, '$1' + '.' + '$2');

    return amount_parts.join('.');
}

function archivo(evt) {
  var files = evt.target.files; // FileList object

  // Obtenemos la imagen del campo "file".
  for (var i = 0, f; f = files[i]; i++) {
  //Solo admitimos imágenes.
    if (!f.type.match('image.*')) {
    continue;
  }

  var reader = new FileReader();

  reader.onload = (function(theFile) {
    return function(e) {
      // Insertamos la imagen
      document.getElementById("list").innerHTML = ['<img class="thumb" src="', e.target.result,'" title="', escape(theFile.name), '"/>'].join('');
    };
  })(f);

  reader.readAsDataURL(f);
  }
}
document.getElementById('files').addEventListener('change', archivo, false);