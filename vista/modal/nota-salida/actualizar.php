<?php 

include'../../../autoload.php';
include'../../../session.php';

$id       =  $_GET['id'];   


$objeto   =  new Movalmcab_salida();

$carpeta  =  "nota-salida";

 ?>

<?php if (count($objeto->consulta($id,'id','NS'))>0): ?>

<form role="form" id="actualizar" autocomplete="off">

<input type="hidden" name="id" value="<?php echo $id; ?>">
<input type="hidden" name="tipo" value="<?php echo $objeto->consulta($id,'tipo','NS'); ?>">

<div class="row">
<div class="col-md-6">
<div class="form-group">
<label>TIPO DE TRANSACCIÓN</label>
<select name="tipo_transaccion" id="" class="form-control" required="">
<option value="<?php echo $objeto->consulta($id,'tipo_transaccion','NS'); ?>"><?php echo $objeto->consulta($id,'tipo_transaccion','NS').' - '.$objeto->consulta($id,'transaccion','NS') ?></option>
<?php 
$transaccion_tipo = new Transaccion_tipo();
foreach ($transaccion_tipo->lista() as $key => $value): ?>
<?php if ($objeto->consulta($id,'tipo_transaccion','NS')!==$value['codigo']): ?>
<option value="<?php echo $value['codigo'] ?>"><?php echo $value['codigo'].' - '.$value['descripcion'] ?></option>
<?php endif ?>
<?php endforeach ?>
</select>
</div>
</div>

<div class="col-md-6">
<div class="form-group">
<label>TIPO DE DOCUMENTO</label>
<select name="tipo_documento" id="" class="form-control" required="">
<option value="<?php echo $objeto->consulta($id,'tipo_documento','NS') ?>"><?php echo $objeto->consulta($id,'tipo_documento','NS').' - '.$objeto->consulta($id,'documento','NS') ?></option>
<?php 
$documento_tipo = new Documento_tipo();
foreach ($documento_tipo->lista() as $key => $value): ?>
<?php if ($objeto->consulta($id,'tipo_documento','NS')!==$value['codigo']): ?>
<option value="<?php echo $value['codigo'] ?>"><?php echo $value['codigo'].' - '.$value['descripcion'] ?></option>
  
<?php endif ?>
  
<?php endforeach ?>
</select>
</div>
</div>
</div>

<div class="row">
<div class="col-md-6">
<div class="form-group">
<label>NUMERO DE REFERENCIA</label>
<input type="text" name="num_ref" id=""  required="" class="form-control" maxlength="100" 
 onchange="Mayusculas(this)" value="<?php echo $objeto->consulta($id,'num_ref','NS'); ?>">
</div>
</div>

<div class="col-md-6">
<div class="form-group">
<label>ORDEN DE TRABAJO</label>
<select name="codigo_ot" id="" class="form-control" required="">
<option value="<?php echo $objeto->consulta($id,'codigo_ot','NS') ?>"><?php echo $objeto->consulta($id,'codigo_ot','NS'); ?></option>
<?php 
$orden_trabajo = new Orden_trabajo();
foreach ($orden_trabajo->lista() as $key => $value): ?>
<?php if ($objeto->consulta($id,'codigo_ot','NS')!==$value['codigo']): ?>
<option value="<?php echo $value['codigo']; ?>"><?php echo $value['codigo']; ?></option>
<?php endif ?>
<?php endforeach ?>
</select>
</div>
</div>
</div>

<div class="row">
<div class="col-md-6">
 <div class="form-group">
<label>CENTRO DE COSTO</label>
<select name="codigo_cc" id="" class="form-control" required="">
<option value="<?php echo $objeto->consulta($id,'codigo_cc','NS'); ?>"><?php echo $objeto->consulta($id,'codigo_cc','NS').' - '.$objeto->consulta($id,'centro_costo','NS') ?></option>
<?php 
$centro_costo = new Centro_costo();
foreach ($centro_costo->lista() as $key => $value): ?>
<?php if ($objeto->consulta($id,'codigo_cc','NS')!==$value['codigo']): ?>
<option value="<?php echo $value['codigo']; ?>"><?php echo $value['codigo'].' - '.$value['descripcion']; ?></option>
<?php endif ?>
<?php endforeach ?>
</select>
</div> 
</div>

<div class="col-md-6">
<div class="form-group">
<label>ÁREA</label>
<select name="area" id="" class="form-control" required="">
<option value="<?php echo $objeto->consulta($id,'id_area','NS'); ?>"><?php echo $objeto->consulta($id,'codigo_area','NS').' - '.$objeto->consulta($id,'area','NS') ?></option>
<?php 
$area = new Area();
foreach ($area->lista() as $key => $value): ?>
<?php if ($objeto->consulta($id,'id_area','NS')!==$value['id']): ?>
<option value="<?php echo $value['codigo']; ?>"><?php echo $value['codigo'].' - '.$value['descripcion']; ?></option>
<?php endif ?>
<?php endforeach ?>
</select>
</div>
</div>
</div>

<div class="row">
<div class="col-md-6">
 <div class="form-group">
<label>FECHA DE INICIO</label>
<input type="date" name="fecha_inicio" id=""  required="" class="form-control" maxlength="20" 
 onchange="Mayusculas(this)" value="<?php echo $objeto->consulta($id,'fecha_inicio','NS'); ?>">
</div> 
</div>
<div class="col-md-6">
<div class="form-group">
<label>FECHA DE FIN</label>
<input type="date" name="fecha_fin" id=""  required="" class="form-control" maxlength="20" 
 onchange="Mayusculas(this)" value="<?php echo $objeto->consulta($id,'fecha_fin','NS'); ?>">
</div>
</div>
</div>

<div class="row">
<div class="col-md-12">
<div class="form-group">
<label>PROVEEDOR</label>
<select name="proveedor" id="" class="form-control" required="">
<option value="<?php echo $objeto->consulta($id,'id_proveedor','NS') ?>"><?php echo $objeto->consulta($id,'proveedor','NS') ?></option>
<?php 
$proveedor = new Proveedor();
foreach ($proveedor->lista() as $key => $value): ?>
<?php if ($objeto->consulta($id,'id_proveedor','NS')!== $value['id']): ?>
<option value="<?php echo $value['id'] ?>"><?php echo $value['contacto'] ?></option>
<?php endif ?>
<?php endforeach ?>
</select>
</div>
</div>
</div>

<div class="form-group">
<label>COMENTARIO</label>
<input type="text" name="comentario" id=""  required="" class="form-control" maxlength="100" 
 onchange="Mayusculas(this)" value="<?php echo $objeto->consulta($id,'comentario','NS'); ?>">
</div>


<div class="form-group">
<label>ESTADO</label><br>
<?php if ($objeto->consulta($id,'estado','NS')=='V'): ?>
   <label class="radio-inline">
    <input type="radio" name="estado"  value="V" checked> ACTIVO
  </label>
  <label class="radio-inline">
    <input type="radio" name="estado"  value="F"> INACTIVO
</label> 
<?php else: ?>
  <label class="radio-inline">
    <input type="radio" name="estado"  value="V" > ACTIVO
  </label>
  <label class="radio-inline">
    <input type="radio" name="estado"  value="F" checked> INACTIVO
  </label>
<?php endif ?>
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