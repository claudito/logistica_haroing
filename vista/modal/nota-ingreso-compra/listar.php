<?php 

include'../../../autoload.php';
include'../../../session.php';

$objeto   =  new Movalmcab();
$titulo   =  "NOTAS DE INGRESO";
$folder   =  "nota-ingreso-compra";


 ?>
 <?php if ($objeto->lista('NI')): ?>
 <div class="panel panel-info">
 	<div class="panel-heading">
 		<h3 class="panel-title"><?php echo $titulo; ?></h3>
 	</div>
 	<div class="panel-body">
 	<div class="table-responsive">
 		<table class="table table-bordered" id="consulta">
 			<thead>
 				<tr class="info">
 					<th>ALM</th>
 					<th>NOTA DE INGRESO</th>
 					<th>TRAN</th>
 					<th>DOC REF</th>
 					<th>NUM REF</th>
 					<th>O/C</th>
 					<th>SOLCITANTE</th>
 					<th>PROVEEDOR</th>
 					<th>FECHA</th>
 					<th>CENTRO DE COSTO</th>
 					<th>ÁREA</th>

 			</thead>
 			<tbody>
 			<?php foreach ($objeto->lista('NI') as $key => $value): ?>
 			<tr>
 			<td><?php echo $value['alm']; ?></td>
 			<td><a href="../docs/pdf/reporte/ni?id=<?php echo $value['numero'] ?>" target="_blank"><?php echo str_pad($value['numero'], 10, "0", STR_PAD_LEFT); ?></a></td>
 			<td><?php echo $value['tran']; ?></td>
 			<td><?php echo $value['doc_ref']; ?></td>
 			<td><?php echo $value['num_ref']; ?></td>
 			<td><?php echo str_pad($value['doc_oc'], 10, "0", STR_PAD_LEFT); ?></td>
            <td><?php echo $value['fullname']; ?></td>
            <td><?php echo $value['ruc'].'-'.$value['razon_social']; ?></td>
            <td><?php echo date_format(date_create($value['fecha']),'d/m/Y'); ?></td>
            <td><?php echo $value['centro_costo']; ?></td>
            <td><?php echo $value['area']; ?></td>
 			</tr>
 			<?php endforeach ?>
 			</tbody>
 		</table>
 	</div>
 	</div>
 </div>
 <script>
 $(document).ready(function(){
    $('#consulta').DataTable();
});
 </script>
 <?php else: ?>
 <p class="alert alert-warning">No Hay Registros Disponibles.</p>
 <?php endif ?>

