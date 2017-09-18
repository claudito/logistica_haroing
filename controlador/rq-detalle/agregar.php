<?php 

include'../../autoload.php';
include'../../session.php';

$idcodigo       =  $funciones->validar_xss($_POST['codigo']);
$articulo       =  new Articulo();
$requisc        =  new Requisc();
$funciones      =  new Funciones();
$message        =  new Message();

$numero         = $funciones->validar_xss($_POST['idnumero']);
$item           = 0;
$codigo         = $articulo->consulta($idcodigo,'codigo');
$descripcion    = $articulo->consulta($idcodigo,'descripcion');
$unidad         = $articulo->consulta($idcodigo,'unidad');
$cantidad       = $funciones->validar_xss($_POST['cantidad']);
$saldo          = $funciones->validar_xss($_POST['cantidad']);
$centro_costo   = $funciones->validar_xss($_POST['centro_costo']);
$ot             = $funciones->validar_xss($_POST['ot']);
$comentario     = $funciones->validar_xss($_POST['comentario']);
$fecha          = date('Y-m-d');
$tipo           = 'RQ';

$requisd =  new Requisd($numero,$item,$codigo,$descripcion,$unidad,$cantidad,$saldo,$centro_costo,$ot,$comentario,$fecha,$tipo);
$valor   =  $requisd->agregar();

switch ($valor) {
	case 'ok':
	echo  $message->mensaje("Buen Trabajo","success","Registro Existoso",2);
		break;
	default:
	echo  $message->mensaje("Error","error","Intente de Nuevo",2);
		break;
}

 ?>