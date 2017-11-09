<?php 

include'../../../autoload.php';
include'../../../session.php';

$id       =  $_GET['id'];   

$objeto   =  new Submenu();

$carpeta  =  "submenu";

 ?>

<?php if (count($objeto->consulta($id,'id'))>0): ?>

<form role="form" id="actualizar" autocomplete="off">

<input type="hidden" name="id" value="<?php echo $id; ?>">

<div class="form-group">
<label>DESCRIPCIÓN</label>
<input type="text" name="descripcion" id=""  required="" class="form-control" maxlength="100" 
 onchange="Mayusculas(this)" value="<?php echo $objeto->consulta($id,'descripcion'); ?>">
</div>

<div class="form-group">
<label>RUTA</label>
<input type="text" name="ruta" id=""  required="" class="form-control" maxlength="100" 
 value="<?php echo $objeto->consulta($id,'ruta'); ?>">
</div>

<div class="form-group">
<label>ITEM</label>
<input type="number" min="1" name="item" id=""  required="" class="form-control" value="<?php echo $objeto->consulta($id,'item') ?>">
</div>

<div class="form-group">
<label>MENÚ</label>
<select name="menu" id="" class="form-control" required="">
<option value="<?php echo $objeto->consulta($id,'idmenu') ?>"><?php echo $objeto->consulta($id,'menu') ?></option>
<?php $menu = new Menu(); foreach ($menu->lista() as $key => $value): ?>
<?php if ($value['id']!==$objeto->consulta($id,'idmenu')): ?>
<option value="<?php echo $value['id']; ?>"><?php echo $value['descripcion']; ?></option>
<?php else: ?>
<?php endif ?>
<?php endforeach ?>
</select>
</div>

<button class="btn btn-primary">Actualizar</button>

</form>

<script>
    $("#actualizar").submit(function(e){
    e.preventDefault();
    var parametros = $(this).serialize();
     $.ajax({
          type: "POST",
          url: "../controlador/<?php echo $carpeta; ?>/actualizar.php",
          data: parametros,
           beforeSend: function(objeto){
            $("#mensaje").html("Mensaje: Cargando...");
            },
          success: function(datos){
          $("#mensaje").html(datos);
         //$("#actualizar")[0].reset();  //resetear inputs
          $('#editModal').modal('hide'); //ocultar modal
          $('body').removeClass('modal-open');
          $("body").removeAttr("style");
          $('.modal-backdrop').remove();
          loadTabla(1);
          menu(1);
          }
      });
  });
</script>


<?php else: ?>
<p class="alert alert-warning">No hay información disponible.</p>
<?php endif ?>