<?php 
include'../../../autoload.php';
include'../../../session.php';
$numero       =  $_GET['id'];
$requisc      =  new Requisc();
$carpeta      =  "ordenes-compra";
$comovd       =  new Comovd();
?>

<?php if (count($comovd->lista($numero,'OC'))>0): ?>
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
<h4 class="modal-title">Detalle de Orden de Compra # <?php echo $numero; ?></h4>
</div>
<form id="detalle">
<input type="hidden" name="numero" value="<?php echo $numero; ?>">
<div class="modal-body">
<div class="table-responsive-off">
  <table class="table table-bordered table-condensed">
    <thead>
      <tr class="info">
        <th class="text-center">IT</th>
        <th>CÓDIGO</th>
        <th>DESCRIPCIÓN</th>
        <th class="text-center">UND</th>
        <th class="text-center">CANT</th>
        <th class="text-center">SALDO</th>
        <th class="text-center">CC</th>
        <th class="text-center">OT</th>
        <th class="text-center">PRECIO</th>
      </tr>
    </thead>
    <tbody>
    <?php foreach ($comovd->lista($numero,'OC') as $key => $value): ?>
    <tr>
    <td class="text-center"><?php echo $value['item']; ?></td>
    <td><?php echo $value['codigo']; ?></td>
    <td><?php echo $value['descripcion']; ?></td>
    <td class="text-center"><?php echo $value['unidad']; ?></td>
    <td class="text-center"><?php echo round($value['cantidad'],2); ?></td>
    <td class="text-center"><?php echo round($value['saldo'],2); ?></td>
    <td class="text-center"><?php echo $value['centro_costo']; ?></td>
    <td class="text-center"><?php echo $value['ot']; ?></td>
    <input type="hidden" name="item[]" value="<?php echo $value['item']; ?>">
    <td ><input type="number" name="precio[]" step="any"  value="<?php echo round($value['precio'],2); ?>"  class="text-center input-sm form-control" min="0.01" ></td>
    </tr>
    <?php endforeach ?>
    </tbody>
  </table>
</div>


</div>
<div class="modal-footer">
<button type="submit" class="btn btn-primary">Actualizar Detalle</button>
</div>
</form>
 <script>
    $("#detalle").submit(function(e){
    e.preventDefault();
    var parametros = $(this).serialize();
     $.ajax({
          type: "POST",
          url: "../controlador/<?php echo $carpeta; ?>/actualizar_detalle.php",
          data: parametros,
           beforeSend: function(objeto){
            $("#mensaje").html("Mensaje: Cargando...");
            },
          success: function(datos){
          $("#mensaje").html(datos);
         //$("#actualizar")[0].reset();  //resetear inputs
          //$('#modal-visualizar').modal('hide'); //ocultar modal
          $('body').removeClass('modal-open');
          $("body").removeAttr("style");
          $('.modal-backdrop').remove();
          loadTabla(1);
          }
      });
  });
</script>



<?php else: ?>
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
<h4 class="modal-title">Transferencia desde Requerimiento de Compra</h4>
</div>
<div class="modal-body">
<div class="alert alert-success">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
  Esta opción le permitira transferir el detalle de los requerimientos de compra.
</div>

<form id="visualizar">


<input type="hidden" name="orden" value="<?php echo $numero; ?>">

<?php if (count($requisc->lista_ordenes('RQ','OC'))>0): ?>

<div class="input-group">
<select name="requerimiento" id="" class="form-control" required="">
<option value="">[ Seleccionar ]</option>
<?php foreach ($requisc->lista_ordenes('RQ','OC') as $key => $value): ?>
<option value="<?php echo $value['numero']; ?>"><?php echo $value['numero'].' - '.$value['centro_costo'].' - '.$value['ot']; ?></option>
<?php endforeach ?>
</select>
<span class="input-group-btn">
<button class="btn btn-primary" type="submit">Transferir Detalle</button>
</span>
</div>
 
<?php else: ?>
  
<p class="alert alert-warning">No Hay requerimientos Disponibles.</p>

<?php endif ?>



</form>


</div>

<script>
    $("#visualizar").submit(function(e){
    e.preventDefault();
    var parametros = $(this).serialize();
     $.ajax({
          type: "POST",
          url: "../controlador/<?php echo $carpeta; ?>/visualizar.php",
          data: parametros,
           beforeSend: function(objeto){
            $("#mensaje").html("Mensaje: Cargando...");
            },
          success: function(datos){
          $("#mensaje").html(datos);
         //$("#actualizar")[0].reset();  //resetear inputs
          $('#modal-visualizar').modal('hide'); //ocultar modal
          $('body').removeClass('modal-open');
          $("body").removeAttr("style");
          $('.modal-backdrop').remove();
          loadTabla(1);
          }
      });
  });
</script>

  
<?php endif ?>


