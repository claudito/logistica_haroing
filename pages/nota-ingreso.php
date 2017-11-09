<?php 
include'../autoload.php';
include'../session.php';
$assets   = new Assets();
$html     = new Html();
$assets   ->principal('Notas de Ingreso');
$assets   ->sweetalert();
$assets   ->datatables();
$html->header();
$folder =  "nota-ingreso-compra";
 ?>

 <style>
 table{font-size: 12px;}
 </style>

<div class="row">
<div class="col-md-12">
<?php include'../vista/nav.php'; ?>
</div>
</div>

<div class="row">
<div class="col-md-12">

<div id="mensaje"></div>
<div id="loader" class="text-center"><img src="../assets/img/loader.gif" alt="loader"></div>
<div id="tabla"></div>

</div>
</div>


<script src="../ajax/app/<?php echo $folder ?>.js"></script>
<script>loadTabla();</script>
<?php $html -> footer(); ?>


