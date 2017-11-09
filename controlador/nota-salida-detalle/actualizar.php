<?php 

include'../../autoload.php';
include'../../session.php';


$funciones   =  new Funciones();
$message     =  new Message();


$id          	= $funciones->validar_xss($_POST['idnumero']);
$tran    		= $funciones->validar_xss($_POST['tipo_transaccion']);
$cantidad    	= $funciones->validar_xss($_POST['cantidad']);
$precio    		= $funciones->validar_xss($_POST['precio']);
$fecha 			= $funciones->validar_xss($_POST['fecha']);
$centro_costo	= $funciones->validar_xss($_POST['codigo_cc']);
$ot				= $funciones->validar_xss($_POST['codigo_ot']);


$movalmdet_salida     =  new Movalmdet_salida('','',$tran,'$item','$codigo','$descripcion','$unidad',$cantidad,$precio,$fecha,$centro_costo,$ot,'');
$valor       = $movalmdet_salida->actualizar($id);



switch ($valor) {
	case 'ok':
	echo  $message->mensaje("Buen Trabajo","success","Registro Actualizado",2);
		break;
	default:
	echo  $message->mensaje("Error","error","Intente de Nuevo",2);
		break;
}

 ?>