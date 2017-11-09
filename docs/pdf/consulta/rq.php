<?php 
$requisc =  new Requisc();
$requisd =  new Requisd();
$objeto  =  new Aprobacion_documentos();
$usuario =  new Usuario();

$firma_1 = $objeto->estado_firma('RQ',$_GET['id'],'1','id_usuario');
$firma_1 = (!empty($firma_1)) ? $firma_1 : 0 ;

$firma_2 = $objeto->estado_firma('RQ',$_GET['id'],'2','id_usuario');
$firma_2 = (!empty($firma_2)) ? $firma_2 : 0 ;

$firma_3 = $objeto->estado_firma('RQ',$_GET['id'],'3','id_usuario');
$firma_3 = (!empty($firma_3)) ? $firma_3 : 0 ;

 ?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Requerimiento de Compra <?php echo str_pad($_GET['id'],10,'0',STR_PAD_LEFT) ?></title>
<link rel="stylesheet" href="<?php echo PATH; ?>assets/css/estilos-rq.css">

</head>
<body>

<div class="imagen-logo">
<img src="../img/logo-pdf.jpg" alt="" width="300">
</div>

<h2 class="center">REQUERIMIENTO DE COMPRA N° <?php echo str_pad($_GET['id'],10,'0',STR_PAD_LEFT) ?></h2>

<table  class="cabecera">
<tr>
<td><strong>SOLICITANTE:</strong></td>
<td><?php echo $requisc->consulta($_GET['id'],'usuario','RQ'); ?></td>
</tr>
<tr>
<td><strong>FECHA DE INICIO:</strong></td>
<td><?php echo date_format(date_create($requisc->consulta($_GET['id'],'fecha_inicio','RQ')),'d/m/Y') ?></td>
</tr>
<tr>
<td><strong>FECHA DE FIN:</strong></td>
<td><?php echo date_format(date_create($requisc->consulta($_GET['id'],'fecha_fin','RQ')),'d/m/Y') ?></td>
</tr>
<tr>
<td><strong>COMENTARIO:</strong></td>
<td><?php echo $requisc->consulta($_GET['id'],'comentario','RQ'); ?></td>
</tr>
<tr>
<td><strong>CENTRO DE COSTO:</strong></td>
<td><?php echo $requisc->consulta($_GET['id'],'centro_costo','RQ'); ?></td>
</tr>
<tr>
<td><strong>ORDEN DE TRABAJO:</strong></td>
<td><?php echo $requisc->consulta($_GET['id'],'orden_trabajo','RQ'); ?></td>
</tr>
<tr>
<td><strong>ÁREA:</strong></td>
<td><?php echo $requisc->consulta($_GET['id'],'area','RQ'); ?></td>
</tr>
<tr>
<td><strong>PRIORIDAD:</strong></td>
<td>
<?php 
switch ($requisc->consulta($_GET['id'],'prioridad','RQ')) {
	case '1':
	echo "BAJA";
	break;
	case '2':
	echo "MEDIA";
	break;
	case '3':
	echo "ALTA";
	break;
	default:
	echo "?";
	break;
}

?>
</td>
</tr>

</table>

<table class="detalle">
<thead>
<tr>
<th class="detalle-th center">IT</th>
<th class="detalle-th left">CÓDIGO</th>
<th class="detalle-th left">DESCRIPCIÓN</th>
<th class="detalle-th center">UND</th>
<th class="detalle-th center">CANT</th>
<th class="detalle-th center">SALDO</th>
<th class="detalle-th center">ESTADO</th>
</tr>
</thead>
<tbody>
<?php 
foreach ($requisd->lista($_GET['id'],'RQ') as $key => $value): ?>
<tr>
<td class="detalle-td center"><?php echo $value['item']; ?></td>
<td class="detalle-td left"><?php echo $value['codigo_articulo']; ?></td>
<td class="detalle-td left"><?php echo $value['descripcion_articulo']; ?></td>
<td class="detalle-td center"><?php echo $value['unidad']; ?></td>
<td class="detalle-td center"><?php echo round($value['cantidad'],2); ?></td>
<td class="detalle-td center"><?php echo round($value['saldo'],2); ?></td>
<td class="detalle-td center"><?php echo $value['estado']; ?></td>
</tr>
<?php endforeach ?>
<tr>
<td class="td-final"></td>
<td class="td-final"></td>
<td class="td-final"></td>
<td class="td-final"></td>
<td class="td-final"></td>
<td class="td-final"></td>
<td class="td-final"></td>
</tr>
</tbody>
</table>


<div id="piedepagina">
<table>

<tr class="firmas">
<td class="firmas-td">
<?php if ($firma_1==0): ?>
<img src="../img/firma/firma_vacia.jpg" alt="firma_1" width="250">
<?php else: ?>
<img src="../img/firma/<?php echo $usuario->consulta($firma_1,'img_firma'); ?>" alt="firma_1" width="250">
<?php endif ?>
</td>
<td class="firmas-td">
<?php if ($firma_2==0): ?>
<img src="../img/firma/firma_vacia.jpg" alt="firma_2" width="250">
<?php else: ?>
<img src="../img/firma/<?php echo $usuario->consulta($firma_2,'img_firma'); ?>" alt="firma_2" width="250">
<?php endif ?>
</td>
<td class="firmas-td">
<?php if ($firma_3==0): ?>
<img src="../img/firma/firma_vacia.jpg" alt="firma_3" width="250">
<?php else: ?>
<img src="../img/firma/<?php echo $usuario->consulta($firma_3,'img_firma'); ?>" alt="firma_3" width="250">
<?php endif ?>
</td>
</tr>


<tr class="firmas">
<td class="center" style="font-size: 14px; text-decoration: overline;">Solicitante</td>
<td class="center" style="font-size: 14px; text-decoration: overline;">Jefe de Área</td>
<td class="center" style="font-size: 14px; text-decoration: overline;">Jefe de Compras</td>
</tr>

</table>
</div>




</body>
</html>