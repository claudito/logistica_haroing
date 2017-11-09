<?php 

include'../../../autoload.php';
include'../../../session.php';

$id       =  $_GET['id'];   


$objeto   =  new Guia_salida();

$carpeta  =  "guia-salida";

 ?>

<?php if (count($objeto->consulta($id,'id','GS'))>0): ?>

<form role="form" id="actualizar" autocomplete="off">

<input type="hidden" name="id" value="<?php echo $id; ?>">
<input type="hidden" name="tipo" value="<?php echo $objeto->consulta($id,'tipo','GS'); ?>">

<div class="row">
<div class="col-md-6">
<div class="form-group">
<label>TIPO DE TRANSACCIÓN</label>
<select name="tipo_transaccion" id="" class="form-control" required="">
<option value="<?php echo $objeto->consulta($id,'tipo_transaccion','GS'); ?>"><?php echo $objeto->consulta($id,'tipo_transaccion','GS').' - '.$objeto->consulta($id,'transaccion','GS') ?></option>
<?php 
$transaccion_tipo = new Transaccion_tipo();
foreach ($transaccion_tipo->lista() as $key => $value): ?>
<?php if ($objeto->consulta($id,'tipo_transaccion','GS')!==$value['codigo']): ?>
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
<option value="<?php echo $objeto->consulta($id,'tipo_documento','GS') ?>"><?php echo $objeto->consulta($id,'tipo_documento','GS').' - '.$objeto->consulta($id,'documento','GS') ?></option>
<?php 
$documento_tipo = new Documento_tipo();
foreach ($documento_tipo->lista() as $key => $value): ?>
<?php if ($objeto->consulta($id,'tipo_documento','GS')!==$value['codigo']): ?>
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
 onchange="Mayusculas(this)" value="<?php echo $objeto->consulta($id,'num_ref','GS'); ?>">
</div>
</div>

<div class="col-md-6">
<div class="form-group">
<label>ORDEN DE TRABAJO</label>
<select name="codigo_ot" id="" class="form-control" required="">
<option value="<?php echo $objeto->consulta($id,'codigo_ot','GS') ?>"><?php echo $objeto->consulta($id,'codigo_ot','GS'); ?></option>
<?php 
$orden_trabajo = new Orden_trabajo();
foreach ($orden_trabajo->lista() as $key => $value): ?>
<?php if ($objeto->consulta($id,'codigo_ot','GS')!==$value['codigo']): ?>
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
<option value="<?php echo $objeto->consulta($id,'codigo_cc','GS'); ?>"><?php echo $objeto->consulta($id,'codigo_cc','GS').' - '.$objeto->consulta($id,'centro_costo','GS') ?></option>
<?php 
$centro_costo = new Centro_costo();
foreach ($centro_costo->lista() as $key => $value): ?>
<?php if ($objeto->consulta($id,'codigo_cc','GS')!==$value['codigo']): ?>
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
<option value="<?php echo $objeto->consulta($id,'id_area','GS'); ?>"><?php echo $objeto->consulta($id,'codigo_area','GS').' - '.$objeto->consulta($id,'area','GS') ?></option>
<?php 
$area = new Area();
foreach ($area->lista() as $key => $value): ?>
<?php if ($objeto->consulta($id,'id_area','GS')!==$value['id']): ?>
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
 onchange="Mayusculas(this)" value="<?php echo $objeto->consulta($id,'fecha_inicio','GS'); ?>">
</div> 
</div>
<div class="col-md-6">
<div class="form-group">
<label>FECHA DE FIN</label>
<input type="date" name="fecha_fin" id=""  required="" class="form-control" maxlength="20" 
 onchange="Mayusculas(this)" value="<?php echo $objeto->consulta($id,'fecha_fin','GS'); ?>">
</div>
</div>
</div>

<div class="row">
<div class="col-md-12">
<div class="form-group">
<label>PROVEEDOR</label>
<select name="proveedor" id="" class="form-control" required="">
<option value="<?php echo $objeto->consulta($id,'id_proveedor','GS') ?>"><?php echo $objeto->consulta($id,'proveedor','GS') ?></option>
<?php 
$proveedor = new Proveedor();
foreach ($proveedor->lista() as $key => $value): ?>
<?php if ($objeto->consulta($id,'id_proveedor','GS')!== $value['id']): ?>
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
 onchange="Mayusculas(this)" value="<?php echo $objeto->consulta($id,'comentario','GS'); ?>">
</div>


<div class="form-group">
<label>ESTADO</label><br>
<?php if ($objeto->consulta($id,'estado','GS')=='V'): ?>
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