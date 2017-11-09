<?php 
$assets   = new Assets();
$html     = new Html();
$message  = new Message();
$assets ->principal('Bienvenidos');
$assets ->sweetalert();
$html->header();

echo  (isset($_GET['ok'])) ? $message->mensaje("Bienvenido","success",$_SESSION[KEY.NOMBRES],2) : "" ;

 ?>


<div class="row">
<div class="col-md-12">
<?php include('nav.php'); ?>
</div>
</div>


<div class="row">
<div class="col-md-12">
<div class="jumbotron">
	<div class="container">
	<div class="row">
	<div class="col-md-4">
	<img src="assets/img/icono.png" alt="" width="400" class="img-responsive">	
	</div>
	<div class="col-md-8">

		<h1><?php echo TITULO_HOME; ?> <small><?php echo VERSION; ?></small></h1>
		<p><?php echo DESC_HOME; ?></p>
		<p>
			<a class="btn btn-primary btn-lg" data-toggle="modal" href="#modal-informacion"><i class="fa fa-search fa-1x"></i> Conoce más del Sistema.</a>
		</p>
	</div>
	</div>
	</div>
</div>
</div>
</div>
<?php include('vista/modal/mas-informacion.php'); ?>
<?php $html -> footer(); ?>