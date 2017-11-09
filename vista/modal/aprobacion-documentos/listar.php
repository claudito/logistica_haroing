<?php 

include'../../../autoload.php';
include'../../../session.php';

$objeto   =  new Aprobacion_documentos();
$folder   =  "aprobacion-documentos";
$tipo     =  $_SESSION[ID.'tipo_documento'];
$usuario  =  new Usuario();

$objeto->fill_firmas($tipo);


switch ($tipo) {
	case 'RQ':
	$titulo  = "REQUERMIENTO DE COMPRAS APROBADAS";
	$firma_1 = "SOLICITANTE";
	$firma_2 = "JEFE DE ÁREA";
	$firma_3 = "ENCARGADO DE COMPRAS";
		break;
	case 'RS':
	$titulo = "REQUERMIENTO DE SERVICIOS APROBADAS";
	$firma_1 = "SOLICITANTE";
	$firma_2 = "JEFE DE ÁREA";
	$firma_3 = "ENCARGADO DE COMPRAS";
		break;
	case 'OC':
	$titulo = "ORDENES DE COMPRA APROBADAS";
	$firma_1 = "GERENTE #1";
	$firma_2 = "GERENTE #2";
	$firma_3 = "ENCARGADO DE COMPRAS";
		break;
	case 'OS':
	$titulo = "ORDENES DE SERVICIOS APROBADAS";
	$firma_1 = "GERENTE #1";
	$firma_2 = "GERENTE #2";
	$firma_3 = "ENCARGADO DE COMPRAS";
		break;
	
	default:
	$titulo="";
		break;
}

 ?>

 <?php if (count($objeto->lista($tipo))>0): ?>
 <div class="panel panel-default">
 	<!-- Default panel contents -->
 	<div class="panel-heading"><?php echo $titulo; ?></div>
 	<div class="panel-body">
 	<div class="table-responsive">
 	<table class="table" id="consulta">
 		<thead>
 			<tr>
 				<th style="text-align: center;">N° de Documento</th>
 				<th style="text-align: center;"><?php echo $firma_1; ?></th>
 				<th style="text-align: center;"><?php echo $firma_2; ?></th>
 				<th style="text-align: center;"><?php echo $firma_3; ?></th>
 				<th style="text-align: center;">FIRMAR DOCUMENTO <i class="glyphicon glyphicon-pencil"></i></th>
 			</tr>
 		</thead>
 		<tbody>
 		<?php foreach ($objeto->lista($tipo) as $key => $value): ?>
 		<tr>
 		<td style="text-align: center;"><?php echo $value['nro_documento']; ?></td>
		<td style="text-align: center;">
		<?php if ($value['firma_1']==1): ?>
		<button class="btn btn-xs btn-success"><i class="fa fa-check-circle-o"></i> 
        <?php echo $usuario->consulta($value['usuario_firma_1'],'nombres').' '.$usuario->consulta($value['usuario_firma_1'],'apellidos'); ?>
		</button>
		<?php else: ?>
		<button class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-remove-circle"></i></button>	
		<?php endif ?>
		</td>
 		<td style="text-align: center;">
		<?php if ($value['firma_2']==1): ?>
		<button class="btn btn-xs btn-success"><i class="fa fa-check-circle-o"></i> 
        <?php echo $usuario->consulta($value['usuario_firma_2'],'nombres').' '.$usuario->consulta($value['usuario_firma_2'],'apellidos'); ?>
		</button>
		<?php else: ?>
		<button class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-remove-circle"></i></button>	
		<?php endif ?>
		</td>
 		<td style="text-align: center;">
		<?php if ($value['firma_3']==1): ?>
		<button class="btn btn-xs btn-success"><i class="fa fa-check-circle-o"></i> 
        <?php echo $usuario->consulta($value['usuario_firma_3'],'nombres').' '.$usuario->consulta($value['usuario_firma_3'],'apellidos'); ?>
		</button>
		<?php else: ?>
		<button class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-remove-circle"></i></button>	
		<?php endif ?>
		</td>
		<td style="text-align: center;"><button class="btn btn-default btn-firmar" 
			 data-numero='<?php echo $value['nro_documento']; ?>' data-tipo='<?php echo $tipo; ?>'><i class="glyphicon glyphicon-pencil"></i></button></td>
 		</tr>
 		<?php endforeach ?>
 		</tbody>
 	</table>
 	</div>
 	</div>
 </div>
<!-- Script Modal Firmar -->
<script>
$(".btn-firmar").click(function(){
	numero = $(this).data("numero");
	tipo   = $(this).data("tipo");
	$.get("../vista/modal/<?php echo $folder; ?>/firmar.php","numero="+numero+"&tipo="+tipo,function(data){
		$("#form-firmar").html(data);
	});
	$('#modal-firmar').modal('show');
});
</script>

<!-- Modal Firmar -->
<div class="modal fade" id="modal-firmar" tabindex="-1" role="dialog" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div id="form-firmar"></div>
</div>
</div>
</div>

 <script>
	$(document).ready(function(){
	$('#consulta').DataTable();
	});
</script>

 <?php else: ?>
 <div class="panel panel-default">
 	<div class="panel-heading">
 		<h3 class="panel-title">APROBACIÓN DE DOCUMENTOS</h3>
 	</div>
 	<div class="panel-body">
 	<p class="alert alert-warning">No Hay documentos Disponibles.</p>
 	</div>
 </div>
 <?php endif ?>

