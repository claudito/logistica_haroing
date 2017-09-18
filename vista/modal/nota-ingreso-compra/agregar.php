<!-- Modal -->
  <div class="modal fade" id="newModal" tabindex="-1" role="dialog" aria-labelledby="newModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title" >Nota de Ingreso por Orden de Compra</h4>
        </div>
        <div class="modal-body">
<form role="form" method="post" id="agregar" autocomplete="off">

<div class="alert alert-success">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
Para poder generar el ingreso seleccione el número del orden compra.
</div>

<div class="input-group">
<select name="orden" id="" class="form-control" required>
<option value="">[ Seleccionar]</option>
<?php 
$comovc = new Comovc();
foreach ($comovc->lista('OC') as $key => $value): ?>
<option value="<?php echo $value['numero']; ?>">#<?php echo $value['numero'].' - '.$value['codigo_centrocosto'].' - '.$value['codigo_ot'] ?></option> 
<?php endforeach ?>
</select>
<span class="input-group-btn">
<button class="btn btn-primary" type="submit">Transferir</button>
</span>
</div>



</form>
        </div>

      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->