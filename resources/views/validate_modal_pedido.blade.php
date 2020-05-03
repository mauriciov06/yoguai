<?php if(isset($_GET['solicitar_pedido']) && $_GET['solicitar_pedido'] == true){ ?>
    <script>
      $(document).ready(function() {
        $(window).load(function(){
          $("#modalPedido").modal("show");
        });
      });
    </script>
<?php }?>