<?php 

include'../../../autoload.php';
include'../../../session.php';

$codigo   =  $_GET['id'];
$objeto   =  new Stock();
$carpeta  =  "stock";
?>

<?php if (count($objeto->consulta($codigo,'id','01'))>0): ?>

<form role="form" id="actualizar" autocomplete="off">

<input type="hidden" name="id" value="<?php echo $codigo; ?>">

<div class="row">
<div class="col-md-4">
<div class="form-group">
<label>CANTIDAD MÍNIMA</label>
<input type="number" name="cant_min" id="" min="0" required="" class="form-control" 
 onchange="Mayusculas(this)" value="<?php echo round($objeto->consulta($codigo,'cant_min','01'),2); ?>" >
</div>
</div>
<div class="col-md-4">
<div class="form-group">
<label>CANTIDAD MÁXIMA</label>
<input type="number" name="cant_max" id="" min="0" required="" class="form-control" 
 onchange="Mayusculas(this)" value="<?php echo round($objeto->consulta($codigo,'cant_max','01'),2); ?>">
</div>
</div>
<div class="col-md-4">
<div class="form-group">
<label>COSTO PROMEDIO</label>
<input type="number" name="costo_prom" id="" min="0" required="" class="form-control" 
 onchange="Mayusculas(this)" value="<?php echo round($objeto->consulta($codigo,'costo_prom','01'),2); ?>">
</div>
</div>
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