<?php 

include'../../autoload.php';
include'../../session.php';


$articulo       		=  new Articulo();
$movalmcab_salida      	=  new Movalmcab_salida();
$funciones      		=  new Funciones();
$message        		=  new Message();

$alm			= '';
$numero         = $funciones->validar_xss($_POST['idnumero']);
$idcodigo       = $funciones->validar_xss($_POST['codigo']);
$tran         	= $funciones->validar_xss($_POST['tipo_transaccion']);
$item           = 0;
$codigo         = $articulo->consulta($idcodigo,'codigo');
$descripcion    = $articulo->consulta($idcodigo,'descripcion');
$unidad         = $articulo->consulta($idcodigo,'unidad');
$cantidad       = $funciones->validar_xss($_POST['cantidad']);
$precio         = $funciones->validar_xss($_POST['precio']);
$fecha          = date('Y-m-d');
$centro_costo   = $funciones->validar_xss($_POST['codigo_cc']);
$ot             = $funciones->validar_xss($_POST['codigo_ot']);
$tipo           = 'NS';

$movalmdet_salida =  new Movalmdet_salida('',$numero,$tran,$item,$codigo,$descripcion,$unidad,$cantidad,$precio,$fecha,$centro_costo,$ot,$tipo);
$valor   =  $movalmdet_salida->agregar();

switch ($valor) {
	case 'ok':
	echo  $message->mensaje("Buen Trabajo","success","Registro Existoso",2);
		break;
	default:
	echo  $message->mensaje("Error","error","Intente de Nuevo",2);
		break;
}

 ?>