<?php 

include'../../../autoload.php';
include'../../../session.php';

$numero  = $_GET['codigo'];

$guia_salida =  new Guia_salida();

?>


<?php if (count($guia_salida->consulta($numero,'numero','GS'))>0): ?>
<div class="panel panel-info">
	<div class="panel-heading">
		<h3 class="panel-title">GUIA DE SALIDA</h3>
	</div>
	<div class="panel-body">

		<div class="table-responsive">
			<table id="consulta" class="table table-bordered table-condensed">
				<thead>
					<tr class="info">
						<td>#</td>
						<td>ALMACÉN</td>
						<td>TIPO DE TRANSACCIÓN</td>
						<td>TIPO DE DOCUMENTO</td>
						<td>NÚMERO DE REFERENCIA</td>
						<td>USUARIO</td>
						<td>PROVEEDOR</td>
						<td>FECHA DE INICIO</td>
						<td>FECHA DE FIN</td>
						<td>COMENTARIO</td>
						<td>CENTRO DE COSTO</td>
						<td>ORDEN DE TRABAJO</td>
						<td>AREA</td>
						<td>ESTADO</td>
					</tr>
				</thead>
				<tbody>
				<tr>
				<td><?php echo $guia_salida->consulta($numero,'numero','GS'); ?></td>
				<td><?php echo $guia_salida->consulta($numero,'alm','GS'); ?></td>
				<td><?php echo $guia_salida->consulta($numero,'tipo_transaccion','GS'); ?></td>
				<td><?php echo $guia_salida->consulta($numero,'tipo_documento','GS'); ?></td>
				<td><?php echo $guia_salida->consulta($numero,'num_ref','GS'); ?></td>
				<td><?php echo $guia_salida->consulta($numero,'usuario','GS'); ?></td>
				<td><?php echo $guia_salida->consulta($numero,'proveedor','GS'); ?></td>
				<td><?php echo date_format(date_create($guia_salida->consulta($numero,'fecha_inicio','GS')),'Y/m/d'); ?></td>
				<td><?php echo date_format(date_create($guia_salida->consulta($numero,'fecha_fin','GS')),'Y/m/d'); ?></td>
				<td><?php echo $guia_salida->consulta($numero,'comentario','GS'); ?></td>
				<td><?php echo $guia_salida->consulta($numero,'codigo_cc','GS'); ?></td>
				<td><?php echo $guia_salida->consulta($numero,'codigo_ot','GS'); ?></td>
				<td><?php echo $guia_salida->consulta($numero,'area','GS'); ?></td>
				<td><?php if ($guia_salida->consulta($numero,'estado','GS')=='V') {
					echo "ACTIVO";
				} else {
					echo "INACTIVO";
				}
				; ?></td>
				</tr>
				</tbody>
			</table>
		</div>
	</div>
</div>
<?php else: ?>
 <p class="alert alert-warning">No Hay registros Disponibles.</p>
<?php endif ?>

 