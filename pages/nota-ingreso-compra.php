<?php 
include'../autoload.php';
include'../session.php';
$assets   = new Assets();
$html     = new Html();
$assets   ->principal('Notas de Ingreso por Orden de Compra');
$assets   ->sweetalert();
$assets   ->datatables();?>
<script src="../ajax/select/js/orden-compra-ni.js"></script>
<script src="../ajax/realtime/js/ni-correlativo.js"></script>
<?php
$html->header();
$carpeta = "nota-ingreso-compra";

 ?>
 <style>
 table{font-size: 12px;}
 </style>
<div class="row">
<div class="col-md-12">
<?php include('../vista/nav.php'); ?>
</div>
</div>

<div class="row">
<div class="col-md-12">
<?php include'../vista/modal/'.$carpeta.'/agregar.php'; ?>
</div>
</div>

<div id="mensaje"></div>

<form  id="agregar" autocomplete="Off">
	
<div class="row">
<div class="col-md-12">
<div id="detalle"></div>
</div>
</div>

</form>


<script src="../ajax/app/<?php echo $carpeta; ?>.js"></script>
<script> 
loadTabla(1); 
</script>
<?php $html -> footer(); ?>


