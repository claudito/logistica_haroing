<!-- Modal -->
  <div class="modal fade" id="newModal" tabindex="-1" role="dialog" aria-labelledby="newModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title" id="correlativo"></h4>
        </div>
        <div class="modal-body">
<form role="form" method="post" id="agregar" autocomplete="off">

<input type="hidden" name="usuario" id="" value="<?php echo $_SESSION[KEY.ID] ?>">

<input type="hidden" name="tipo" id="" class="form-control" value="GS">

<div class="row">
<div class="col-md-6">
<div class="form-group">
<label>ALMACÉN</label>
<input type="text" name="alm" id="" value="01" required="" class="form-control" maxlength="100" onchange="Mayusculas(this)" readonly="">
</div>
</div>

<div class="col-md-6">
<div class="form-group">
<label>TIPO DE TRANSACCIÓN</label>
<select name="tipo_transaccion" id="" class="form-control">
<option value="">[Seleccionar]</option>
<?php
$transaccion_tipo = new Transaccion_tipo();
foreach ($transaccion_tipo->lista() as $key => $value): ?>
<option value="<?php echo $value['codigo'] ?>"><?php echo $value['codigo'].' - '.$value['descripcion'];?></option>
<?php endforeach ?>
</select>
</div>
</div>
</div>

<div class="row">
<div class="col-md-6">
<div class="form-group">
<label>TIPO DE DOCUMENTO</label>
<select name="tipo_documento" id="" class="form-control">
<option>[Seleccionar]</option>
<?php
$documento_tipo = new Documento_tipo();
foreach ($documento_tipo->lista() as $key => $value): ?>
<option value="<?php echo $value['codigo'] ?>"><?php echo $value['codigo'].' - '.$value['descripcion'] ?></option>
<?php endforeach ?>
</select>
</div>
</div>

<div class="col-md-6">
<div class="form-group">
<label>NUMERO DE REFERENCIA</label>
<input type="text" name="num_ref" id=""  required="" class="form-control" maxlength="100" onchange="Mayusculas(this)">
</div>
</div>
</div>

<div class="row">
<div class="col-md-12">
<div class="form-group">
<label>PROVEEDOR</label>
<select name="proveedor" id="" class="form-control">
<option>[Seleccionar]</option>
<?php 
$proveedor = new Proveedor();
foreach ($proveedor->lista() as $key => $value): ?>
<option value="<?php echo $value['id'] ?>"><?php echo $value['codigo'].' - '.$value['contacto'] ?></option> 
<?php endforeach ?>
</select>
</div>
</div>
</div>

<div class="row">
<div class="col-md-6">
<div class="form-group">
<label>ÁREA</label>
<select name="area" id="" class="form-control">
<option value="">[Seleccionar]</option>
<?php
$area = new Area(); 
foreach ($area->lista() as $key => $value): ?>
<option value="<?php echo $value['id']?>"><?php echo $value['codigo'].'-'.$value['descripcion']?></option>
<?php endforeach ?>
</select>
</div>
</div>
</div>

<div class="row">
<div class="col-md-6">
<div class="form-group">
<label>FECHA DE INICIO</label>
<input type="date" name="fecha_inicio" id=""  required="" class="form-control" maxlength="100" onchange="Mayusculas(this)">
</div>
</div>
<div class="col-md-6">
<div class="form-group">
<label>FECHA DE FIN</label>
<input type="date" name="fecha_fin" id=""  required="" class="form-control" maxlength="100" onchange="Mayusculas(this)">
</div>
</div>
</div>

<div class="row">
<div class="col-md-6">
<div class="form-group">
<label>CENTRO DE COSTO</label>
<select name="codigo_cc" id="" class="form-control" required="">
  <option value="">[Seleccionar]</option>
  <?php 
  $centro_costo = new Centro_costo();
  foreach ($centro_costo->lista() as $key => $value): ?>
   <option value="<?php echo $value['codigo']?>"><?php echo $value['codigo'].'-'.$value['descripcion']?></option> 
  <?php endforeach ?>
</select>
</div>
</div>

<div class="col-md-6">
<div class="form-group">
<label>ORDEN DE TRABAJO</label>
<select name="codigo_ot" id="" class="form-control">
<option value="">[Seleccionar]</option>
<?php 
$orden_trabajo = new Orden_trabajo();
foreach ($orden_trabajo->lista() as $key => $value): ?>
<option value="<?php echo $value['codigo'] ?>"><?php echo $value['codigo'].' - '.$value['cliente'] ?></option>
<?php endforeach ?>
</select>
</div>
</div>
</div>

<div class="form-group">
<label>COMENTARIO</label>
<textarea name="comentario" id="input" class="form-control" rows="3" required="" onchange="Mayusculas(this)"></textarea>
</div>

<button type="submit" class="btn btn-primary">Agregar</button>
</form>
        </div>

      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->