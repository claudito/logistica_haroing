<?php 

include'../../../autoload.php';
include'../../../session.php';

$objeto   =  new Stock();
$titulo   =  "STOCK";
$folder   =  "stock";
?>
<?php if (count($objeto->lista())>0): ?>
<div class="panel panel-info">
	<div class="panel-heading">
		<h3 class="panel-title"><?php echo $titulo; ?></h3>
	</div>
	<div class="panel-body">
	<div class="table-responsive">
		<table id="consulta"  class="table table-bordered table-condensed">
			<thead>
				<tr>
					<th>ALM</th>
					<th>CÓDIGO</th>
					<th>DESCRIPCIÓN</th>
					<th class="text-center">CANT</th>
					<th class="text-center">CANT MIN</th>
					<th class="text-center">CANT MAX</th>
					<th class="text-center">COSTO</th>
					<th class="text-center">ACCIONES</th>
				</tr>
			</thead>
			<tbody>
			<?php foreach ($objeto->lista() as $key => $value): ?>
			<tr>
			<td><?php echo $value['alm']; ?></td>
			<td><?php echo $value['codigo']; ?></td>
			<td><?php echo $value['descripcion']; ?></td>
			<td class="text-center"><?php echo round($value['cantidad'],2); ?></td>
			<td class="text-center"><?php echo round($value['cant_min'],2); ?></td>
			<td class="text-center"><?php echo round($value['cant_max'],2); ?></td>
			<td class="text-center"><?php echo round($value['costo_prom'],2); ?></td>
			<td class="text-center">
			<a data-id="<?php echo $value['codigo'];?>" id=""  class="btn btn-edit btn-sm btn-info"><i class="glyphicon glyphicon-edit"></i></a>
			</td>
			</tr>
			<?php endforeach ?>
			</tbody>
		</table>
	</div>
	</div>
</div>

<!-- Modal  Actualizar-->
  <script>
  	$(".btn-edit").click(function(){
  		id = $(this).data("id");
  		$.get("../vista/modal/<?php echo $folder; ?>/actualizar.php","id="+id,function(data){
  			$("#form-edit").html(data);
  		});
  		$('#editModal').modal('show');
  	});
  </script>
  <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Actualizar</h4>
        </div>
        <div class="modal-body">
        <div id="form-edit"></div>
        </div>

      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal  Actualizar-->

<script>
$(document).ready(function(){
    $('#consulta').DataTable();

});
</script>
<?php else: ?>
<div class="panel panel-info">
	<div class="panel-heading">
		<h3 class="panel-title"><?php echo $titulo; ?></h3>
	</div>
	<div class="panel-body">
	<p class="alert alert-warning">No hay registros disponibles.</p>
	</div>
</div>
<?php endif ?>

