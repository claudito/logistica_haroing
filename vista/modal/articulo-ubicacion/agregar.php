<!-- Modal -->
  <div class="modal fade" id="newModal" tabindex="-1" role="dialog" aria-labelledby="newModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Agregar</h4>
        </div>
        <div class="modal-body">
<form role="form" method="post" id="agregar" autocomplete="off">

<div class="row">
<div class="col-md-6">
<div class="form-group">
<label>CÓDIGO DE ARTÍCULO</label>
<select name="codigo_articulo" id="" class="form-control">
<option value="">[Seleccionar]</option>
<?php 
$articulo = new Articulo();
foreach ($articulo->lista_ubicacion() as $key => $value): ?>
<option value="<?php echo $value['codigo'] ?>"><?php echo $value['codigo'].' - '.$value['descripcion'] ?></option>
<?php endforeach ?>
</select>
</div>
</div>
<div class="col-md-6">
<div class="form-group">
<label>UBICACIÓN</label>
<input type="text" name="codigo" id=""  required="" class="form-control" maxlength="20" 
 onchange="Mayusculas(this)">
</div>
</div>
</div>

<div class="form-group">
<label>DESCRIPCIÓN</label>
<input type="text" name="descripcion" id=""  required="" class="form-control" maxlength="200" onchange="Mayusculas(this)">
</div>


  <button type="submit" class="btn btn-primary">Agregar</button>
</form>
        </div>

      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->