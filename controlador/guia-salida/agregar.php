<?php 

include'../../autoload.php';
include'../../session.php';

$message   =  new Message();
$funciones =  new Funciones();


if (isset($_POST['alm']) AND isset($_POST['tipo_transaccion']) AND isset($_POST['tipo_documento']) AND isset($_POST['num_ref']) AND isset($_POST['usuario']) AND isset($_POST['proveedor']) AND isset($_POST['fecha_inicio']) AND isset($_POST['fecha_fin']) AND isset($_POST['comentario']) AND isset($_POST['codigo_cc']) AND isset($_POST['codigo_ot']) AND isset($_POST['area']) AND isset($_POST['tipo'])) 
{


	$correlativo = new Correlativo();
 
	$numero      		=  $correlativo->correlativo('GS','numero')+1;
	$alm 				=  $funciones->validar_xss($_POST['alm']);
	$tran 				=  $funciones->validar_xss($_POST['tipo_transaccion']);
	$doc_ref 			=  $funciones->validar_xss($_POST['tipo_documento']);
	$num_ref 			=  $funciones->validar_xss($_POST['num_ref']);
	$id_usuario 		=  $funciones->validar_xss($_POST['usuario']);
	$id_proveedor 		=  $funciones->validar_xss($_POST['proveedor']);
	$fecha_inicio 		=  $funciones->validar_xss($_POST['fecha_inicio']);
	$fecha_fin 			=  $funciones->validar_xss($_POST['fecha_fin']);
	$comentario  		=  $funciones->validar_xss($_POST['comentario']);
	$centro_costo 		=  $funciones->validar_xss($_POST['codigo_cc']);
	$ot 				=  $funciones->validar_xss($_POST['codigo_ot']);
	$area 				=  $funciones->validar_xss($_POST['area']);
	$tipo 				=  $funciones->validar_xss($_POST['tipo']);


if (strlen($alm)>0 AND strlen($tran)>0 AND strlen($doc_ref)>0 AND strlen($num_ref)>0 AND strlen($id_usuario)>0 AND strlen($id_proveedor)>0 AND strlen($fecha_inicio)>0 AND strlen($fecha_fin)>0 AND strlen($comentario)>0 AND strlen($centro_costo)>0 AND strlen($ot)>0 AND strlen($area)>0 AND strlen($tipo)>0) 
{
  
$objeto      =  new Guia_salida($numero,$alm,$tran,$doc_ref,$num_ref,$id_usuario,$id_proveedor,$fecha_inicio,$fecha_fin,$comentario,$centro_costo,$ot,$area,$tipo);
$valor       =  $objeto->agregar();

if ($valor=='existe') 
{
  echo  $message->mensaje("Registro duplicado","warning","Intente con otra descripción",2);
} 
else if($valor=='ok')
{
  echo  $message->mensaje("Buen Trabajo","success","Registro Existoso",2);
  $correlativo  =  new Correlativo('GS','',1);
  $correlativo->actualizar_correlativo();
}
else
{
  echo  $message->mensaje("Error de Registro","error","Consulte al área de Soporte",2);
}

} 
else
{
  echo  $message->mensaje("Algún dato esta vacío","error","Verifique de nuevo",2);
}





}
else
{
  echo  $message->mensaje("Algúna variable no esta definida","error","Consulte al área de soporte",2);
}




 ?>