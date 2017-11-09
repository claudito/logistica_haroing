<?php 

include'../../../autoload.php';
include'../../../session.php';

$menu           =  new Menu();
$submenu        =  new Submenu();
$usuario        =  $_GET['id'];
$carpeta        =  "usuario";

 ?>
<style>
li{
  list-style: none;

   }
</style>

<form role="form" id="permisos" autocomplete="off">

<input type="hidden" name="usuario" value="<?php echo $usuario; ?>">
<div class="form-group">

<button class="btn btn-primary btn-sm" type="submit"><i class="glyphicon glyphicon-refresh"></i> Actualizar</button>
</div>

<div class="panel-group" >

<?php foreach ($menu->lista() as $key => $value): ?>
<div class="panel panel-default">
<div class="panel-heading">
<a class="panel-title collapsed tam" data-toggle="collapse"  href="#panel-element-<?php echo $value['id'] ?>"><?php echo $value['descripcion']; ?></a>
</div>

<div id="panel-element-<?php echo $value['id'] ?>" class="panel-collapse collapse">
<div class="panel-body">
 <ul>
 <?php foreach ($submenu->lista_nav($value['id']) as $key => $value): ?>
 <?php $permiso_menu   =  new Permiso_menu($value['id'],$usuario);  ?>
 <?php if ($permiso_menu->permiso_nav('estado')==1): ?>
  <li><input type="checkbox" name="<?php echo $value['id']; ?>" id="" checked><?php echo $value['descripcion']; ?></li>
 <?php else: ?>
  <li><input type="checkbox" name="<?php echo $value['id']; ?>" id=""><?php echo $value['descripcion']; ?></li>
 <?php endif ?>

 <?php endforeach ?>
 </ul>
</div>
</div>

</div>

<?php endforeach ?>

</div>


</form>

<script>
    $("#permisos").submit(function(e){
    e.preventDefault();
    var parametros = $(this).serialize();
     $.ajax({
          type: "POST",
          url: "../controlador/<?php echo $carpeta; ?>/permisos.php",
          data: parametros,
           beforeSend: function(objeto){
            $("#mensaje").html("Mensaje: Cargando...");
            },
          success: function(datos){
          $("#mensaje").html(datos);
         //$("#actualizar")[0].reset();  //resetear inputs
          //$('#permisosModal').modal('hide'); //ocultar modal
          $('body').removeClass('modal-open');
          $("body").removeAttr("style");
          //$('.modal-backdrop').remove();
          //loadTabla(1);
          menu(1);
          }
      });
  });
</script>