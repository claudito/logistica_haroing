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


<div class="form-group">
<label>CÓDIGO</label>
<input type="text" name="codigo" id=""  required="" class="form-control" maxlength="20" 
 onchange="Mayusculas(this)">
</div>



<div class="form-group">
<label>DESCRIPCIÓN</label>
<input type="text" name="descripcion" id=""  required="" class="form-control" maxlength="100" onchange="Mayusculas(this)">
</div>

<div class="form-group">
<label>NOTA DE INGRESO</label><br>
<label class="radio-inline">
<input type="radio" name="ni"  value="1"> SI
</label>
<label class="radio-inline">
<input type="radio" name="ni"  value="0"> NO
</label> 
</div>

<div class="form-group">
<label>NOTA DE SALIDA</label><br>
<label class="radio-inline">
<input type="radio" name="ns"  value="1"> SI
</label>
<label class="radio-inline">
<input type="radio" name="ns"  value="0"> NO
</label>
</div>



  <button type="submit" class="btn btn-primary">Agregar</button>
</form>
        </div>

      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->