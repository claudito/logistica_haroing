<?php 
$assets   = new Assets();
$html     = new Html();
$message  = new Message();
$assets ->principal('Bienvenidos');
$assets ->sweetalert();
$html->header();

echo  (isset($_GET['ok'])) ? $message->bienvenido($_SESSION[KEY.CORREO]) : "" ;

 ?>

<div class="row">
<div class="col-md-12">
<?php include('nav.php'); ?>
</div>
</div>


<div class="row">
<div class="col-md-12">
<div class="alert alert-success">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	 Bienvenido: <?php echo $_SESSION[KEY.CORREO]; ?>
</div>
</div>
</div>

<?php $html -> footer(); ?>