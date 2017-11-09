
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Nota de Ingreso</title>
<link rel="stylesheet" href="<?php echo PATH; ?>assets/css/estilos-oc.css">

<?php 

$objeto_cab  =  new Movalmcab();
 ?>

</head>
<body>

<div class="right"><span class="pagenum"></span></div>

<div class="imagen-logo">
<img src="../img/logo-pdf.jpg" alt="" width="300">
</div>

<ul>
<li><?php echo EMPRESA; ?></li>
<li><?php echo RUC; ?></li>
<li><?php echo DIRECCION; ?></li>
<li><?php echo TELEFONO; ?></li>
<li><?php echo EMAIL; ?></li>
</ul>

<table class="table-cabecera">
<tr>
<td class="name-documento">N° NOTA DE INGRESO</td>
<td class="name-documento"><?php echo str_pad($_GET['id'],10,'0',STR_PAD_LEFT) ?></td>
</tr>
</table>

<table class="cabecera">
<tr>
<td class="cabecera-td">ALM</td>
<td class="cabecera-td"><?php echo $objeto_cab->consulta('NI',$_GET['id'],'alm'); ?></td>
<td class="cabecera-td">FECHA EMISIÓN</td>
<td class="cabecera-td"></td>
</tr>
<tr>
<td class="cabecera-td">RUC</td>
<td class="cabecera-td"></td>
<td class="cabecera-td">FECHA DE ENTREGA</td>
<td class="cabecera-td"></td>
</tr>
<tr>
<td class="cabecera-td">DIRECCIÓN</td>
<td class="cabecera-td"></td>
<td class="cabecera-td">COMPRADOR</td>
<td class="cabecera-td">GUSTAVO MONTERO</td>
</tr>
<tr>
<td class="cabecera-td">CONTACTO</td>
<td class="cabecera-td"></td>
<td class="cabecera-td">REQUISCIÓN</td>
<td class="cabecera-td"></td>
</tr>
<tr>
<td class="cabecera-td">EMAIL</td>
<td class="cabecera-td"></td>
<td class="cabecera-td">COTIZACIÓN</td>
<td class="cabecera-td"></td>
</tr>
<tr>
<td class="cabecera-td">TELÉFONO</td>
<td class="cabecera-td"></td>
<td class="cabecera-td"></td>
<td class="cabecera-td"></td>
</tr>

</table>

<table class="detalle">
<thead>
<tr>
<th class="detalle-th center">IT</th>
<th class="detalle-th left">CÓDIGO</th>
<th class="detalle-th left">DESCRIPCIÓN</th>
<th class="detalle-th center">CANT</th>
<th class="detalle-th center">UND</th>
<th class="detalle-th center">CC</th>
<th class="detalle-th center">PU LISTA</th>
<th class="detalle-th center">DSCTO</th>
<th class="detalle-th center">PU NETO</th>
<th class="detalle-th right">TOTAL</th>
</tr>
</thead>
<tbody>

</tbody>
<tr>
<td class="td-final"></td>
<td class="td-final"></td>
<td class="td-final"></td>
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





</body>
</html>