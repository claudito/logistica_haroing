<?php 

include'../../../autoload.php';
include'../../../session.php';

$id                 =  $_GET['id'];
$movalmdet_salida   =  new Movalmdet_salida();
$carpeta            =  "nota-salida-detalle";

?>

<form id="actualizar" autocomplete="off">
 
<div class="row">
<div class="col-md-6">
<div class="form-group">
<label>TIPO DE TRANSACCIÓN</label>
<select name="tipo_transaccion" id="" class="form-control">
<option value="<?php echo $movalmdet_salida->consulta('$id','tipo_transaccion','NS') ?>"><?php echo $movalmdet_salida->consulta($id,'tipo_transaccion','NS').' - '.$movalmdet_salida->consulta($id,'transaccion','NS'); ?></option>
<?php 
$transaccion_tipo = new Transaccion_tipo();
foreach ($transaccion_tipo->lista() as $key => $value): ?>
<?php if ($movalmdet_salida->consulta($id,'tipo_transaccion','NS')!== $value['codigo']): ?>
<option value="<?php echo $value['codigo'] ?>"><?php echo $value['codigo'].' - '.$value['descripcion'] ?></option>
<?php endif ?>
<?php endforeach ?>
</select>
</div>
</div>

<div class="col-md-6">
<div class="form-group">
<label>CANTIDAD</label>
<input type="number" step="any" name="cantidad" id="" class="form-control" required="" min="0.00" 
 value="<?php echo round($movalmdet_salida->consulta($id,'cantidad'),2); ?>">
</div>
</div>
</div>


<div class="row">
<div class="col-md-6">
<div class="form-group">
<label>PRECIO</label>
<input type="number" step="any" name="precio" id="" class="form-control" required="" min="0.00" 
 value="<?php echo round($movalmdet_salida->consulta($id,'precio'),2); ?>">
</div>
</div>

<div class="col-md-6">
<div class="form-group">
<label>FECHA</label>
<input type="date" name="fecha" id=""  required="" class="form-control" maxlength="20" 
 onchange="Mayusculas(this)" value="<?php echo $movalmdet_salida->consulta($id,'fecha','NS'); ?>">
</div>
</div>
</div>


<div class="row">
<div class="col-md-6">
<div class="form-group">
<label>CENTRO DE COSTO</label>
<select name="codigo_cc" id="" class="form-control" required="">
<option value="<?php echo $movalmdet_salida->consulta($id,'codigo_cc','NS') ?>"><?php echo $movalmdet_salida->consulta($id,'centro_costo','NS') ?></option>
<?php 
$centro_costo = new Centro_costo();
foreach ($centro_costo->lista() as $key => $value): ?>
<?php if ($movalmdet_salida->consulta($id,'centro_costo','NS')!==$value['id']): ?>
<option value="<?php echo $value['codigo']; ?>"><?php echo $value['descripcion']; ?></option>
<?php endif ?>
<?php endforeach ?>
</select>
</div>
</div>

<div class="col-md-6">
 <div class="form-group">
<label>ORDEN DE TRABAJO</label>
<select name="codigo_ot" id="" class="form-control" required="">
<option value="<?php echo $movalmdet_salida->consulta($id,'codigo_ot','NS') ?>"><?php echo $movalmdet_salida->consulta($id,'codigo_ot','NS'); ?></option>
<?php 
$orden_trabajo = new Orden_trabajo();
foreach ($orden_trabajo->lista() as $key => $value): ?>
<?php if ($movalmdet_salida->consulta($id,'codigo_ot','NS')!==$value['codigo']): ?>
<option value="<?php echo $value['codigo']; ?>"><?php echo $value['codigo']; ?></option>
<?php endif ?>
<?php endforeach ?>
</select>
</div> 
</div>
</div>


<input type="hidden"  name="idnumero"  id="idnumero"  value="<?php echo $id; ?>">


<button type="submit" class="btn btn-primary">Actualizar</button>


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
          loadTabla(1,<?php echo $movalmdet_salida->consulta($id,'numero'); ?>);
          }
      });
  });
</script>