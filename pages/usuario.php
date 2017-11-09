<?php 
include'../autoload.php';
include'../session.php';
$assets   = new Assets();
$html     = new Html();
$assets   ->principal('Usuarios');
$assets   ->sweetalert();
$assets   ->datatables();
$html->header();
$carpeta = "usuario";

include'../vista/modal/'.$carpeta.'/agregar.php';
include'../vista/modal/'.$carpeta.'/eliminar.php';

 ?>

<!-- Menú -->
<div class="row">
<div class="col-md-12">
<div id="loader-menu"></div>
<div id="tabla-menu"></div>
</div>
</div>


<div class="row">
<div class="col-md-12">
<div class="pull-right">
<a data-toggle="modal" href="#newModal" class="btn btn-primary"><i class="fa fa-plus"></i>  Agregar Registro</a>
</div>



<div id="loader" class="text-center"> <img src="../assets/img/loader.gif"></div>
<div id="mensaje"></div><!-- Datos ajax Final -->
<div id="tabla"></div><!-- Datos ajax Final -->

</div>
</div>

<script src="../ajax/app/<?php echo $carpeta; ?>.js"></script>
<script> 
loadTabla(1);
menu(1);
</script>
<?php $html -> footer(); ?>


