<?php 

include'../../autoload.php';
include'../../session.php';

$message     =  new Message();
$funciones   =  new Funciones();

if (isset($_POST['id']) AND isset($_POST['tipo_transaccion']) AND isset($_POST['tipo_documento']) AND isset($_POST['num_ref']) AND isset($_POST['proveedor']) AND isset($_POST['fecha_inicio']) AND isset($_POST['fecha_fin']) AND isset($_POST['comentario']) AND isset($_POST['codigo_cc']) AND isset($_POST['codigo_ot']) AND isset($_POST['area']) AND isset($_POST['tipo']) AND isset($_POST['estado']))
{
	
    $id          		=  $funciones->validar_xss($_POST['id']);
    $tran          		=  $funciones->validar_xss($_POST['tipo_transaccion']);
	$doc_ref         	=  $funciones->validar_xss($_POST['tipo_documento']);
	$num_ref          	=  $funciones->validar_xss($_POST['num_ref']);
	$id_proveedor       =  $funciones->validar_xss($_POST['proveedor']);
	$fecha_inicio 		=  $funciones->validar_xss($_POST['fecha_inicio']);
	$fecha_fin 			=  $funciones->validar_xss($_POST['fecha_fin']);
	$comentario 		=  $funciones->validar_xss($_POST['comentario']);
	$centro_costo 		=  $funciones->validar_xss($_POST['codigo_cc']);
	$ot 				=  $funciones->validar_xss($_POST['codigo_ot']);	
	$area 				=  $funciones->validar_xss($_POST['area']);
    $tipo 				=  $funciones->validar_xss($_POST['tipo']);
	$estado 			=  $funciones->validar_xss($_POST['estado']);


if (strlen($id)>0 AND strlen($tran)>0 AND strlen($doc_ref)>0 AND strlen($num_ref)>0 AND strlen($id_proveedor)>0 AND strlen($fecha_inicio)>0 AND strlen($fecha_fin)>0 AND strlen($comentario)>0 AND strlen($centro_costo)>0 AND strlen($ot)>0 AND strlen($area)>0 AND strlen($tipo)>0 AND strlen($estado)>0) 
{
	
$objeto      =  new Movalmcab_salida('','',$tran,$doc_ref,$num_ref,'',$id_proveedor,$fecha_inicio,$fecha_fin,$comentario,$centro_costo,$ot,$area,$tipo,$estado);
$valor       =  $objeto->actualizar($id);


if($valor=='ok')
{
  echo  $message->mensaje("Buen Trabajo","success","Registro Actualizado",2);
}
else
{
  echo  $message->mensaje("Error de Actualización","error","Consulte al área de Soporte",2);
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