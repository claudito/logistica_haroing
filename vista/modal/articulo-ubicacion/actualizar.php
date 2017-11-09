<?php 

include'../../../autoload.php';
include'../../../session.php';

$id       =  $_GET['id'];
$objeto   =  new Articulo_ubicacion();
$carpeta  =  "articulo-ubicacion";

 ?>

<?php if (count($objeto->consulta($id,'id'))>0): ?>

<form role="form" id="actualizar" autocomplete="off">

<input type="hidden" name="id" value="<?php echo $id; ?>">

<div class="row">
<div class="col-md-6">
<div class="form-group">
<label>CODIGO DE ARTÍCULO</label>
<input type="text" name="codigo_articulo" id=""  required="" class="form-control" maxlength="20" readonly=""
 onchange="Mayusculas(this)" value="<?php echo $objeto->consulta($id,'codigo_articulo'); ?>">
</div>
</div>
<div class="col-md-6">
<div class="form-group">
<label>UBICACIÓN</label>
<input type="text" name="codigo" id=""  required="" class="form-control" maxlength="20" 
 onchange="Mayusculas(this)" value="<?php echo $objeto->consulta($id,'codigo'); ?>">
</div>
</div>
</div>


<div class="form-group">
<label>DESCRIPCIÓN</label>
<input type="text" name="descripcion" id=""  required="" class="form-control" maxlength="100" 
 onchange="Mayusculas(this)" value="<?php echo $objeto->consulta($id,'descripcion'); ?>">
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
          }
      });
  });
</script>


<?php else: ?>
<p class="alert alert-warning">No hay información disponible.</p>
<?php endif ?>