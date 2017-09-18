<?php 

include'../../../autoload.php';
include'../../../session.php';

$id       =  $_GET['id'];  
$carpeta  =  "articulo_file";


$articulo_file  =  new Articulo_file();
?>

<?php if (count($articulo_file->lista($id))>0): ?>


<form id="files">
<div class="table-responsive">
	<table class="table table-condensed">
		<thead>
			<tr>
				<th>ARCHIVO</th>
				<th><button class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Eliminar</button></th>
				
			</tr>
		</thead>
		<tbody>
		<?php foreach ($articulo_file->lista($id) as $key => $value): ?>
		<tr>
		<td><a href="<?php echo PATH; ?>upload/articulo_file/<?php echo $value['ruta']; ?>" target="_blank"><?php echo $value['nombre']; ?></a></td>
		<td><input type="checkbox" name="id[]"  value="<?php echo $value['id']; ?>"></td>
		</tr>
		<?php endforeach ?>
		</tbody>
	</table>
</div>

</form>

<script>
    $("#files").submit(function(e){
    e.preventDefault();
    var parametros = $(this).serialize();
     $.ajax({
          type: "POST",
          url: "../controlador/<?php echo $carpeta; ?>/eliminar.php",
          data: parametros,
           beforeSend: function(objeto){
            $("#mensaje").html("Mensaje: Cargando...");
            },
          success: function(datos){
          $("#mensaje").html(datos);
         //$("#actualizar")[0].reset();  //resetear inputs
          $('#modal-listar-files').modal('hide'); //ocultar modal
          $('body').removeClass('modal-open');
          $("body").removeAttr("style");
          $('.modal-backdrop').remove();
          loadTabla();
          }
      });
  });
</script>


<?php else: ?>
<p class="alert alert-warning">No hay archivos disponibles</p>
<?php endif ?>
	