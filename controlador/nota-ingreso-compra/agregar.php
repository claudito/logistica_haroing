<?php 


include'../../autoload.php';
include'../../session.php';

$message   =  new Message();
$funciones =  new Funciones();


$orden 	=  $funciones->validar_xss($_POST['orden']);


echo $orden;

 ?>