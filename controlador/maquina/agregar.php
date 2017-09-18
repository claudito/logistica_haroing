<?php 

include'../../autoload.php';
include'../../session.php';

$message   =  new Message();
$funciones =  new Funciones();

if (isset($_POST['codigo']) AND isset($_POST['fecha_adquisicion']) AND isset($_POST['fecha_inicio']) AND isset($_POST['fecha_termino']) AND isset($_POST['cantidad']) AND isset($_POST['contrato_factura']) AND isset($_POST['descripcion']) AND isset($_POST['descripcion_abrv']) AND isset($_POST['modelo']) AND isset($_POST['serie']) AND isset($_POST['marca'])) 
{
 
$codigo       			=  $funciones->validar_xss($_POST['codigo']);
$fecha_adquisicion  	=  $funciones->validar_xss($_POST['fecha_adquisicion']);
$fecha_inicio  			=  $funciones->validar_xss($_POST['fecha_inicio']);
$fecha_termino  		=  $funciones->validar_xss($_POST['fecha_termino']);
$cantidad  				=  $funciones->validar_xss($_POST['cantidad']);
$contrato_factura  		=  $funciones->validar_xss($_POST['contrato_factura']);
$descripcion  			=  $funciones->validar_xss($_POST['descripcion']);
$descripcion_abrv 		=  $funciones->validar_xss($_POST['descripcion_abrv']);
$modelo  				=  $funciones->validar_xss($_POST['modelo']);
$serie  				=  $funciones->validar_xss($_POST['serie']);
$marca  				=  $funciones->validar_xss($_POST['marca']);

if (strlen($codigo)>0 AND strlen($fecha_adquisicion)>0 AND strlen($fecha_inicio)>0 AND strlen($fecha_termino)>0 AND strlen($cantidad)>0 AND strlen($contrato_factura)>0 AND strlen($descripcion)>0 AND strlen($descripcion_abrv)>0 AND strlen($modelo)>0 AND strlen($serie)>0 AND strlen($marca)>0) 
{
  
$objeto      =  new Maquina($codigo,$fecha_adquisicion,$fecha_inicio,$fecha_termino,$cantidad,$contrato_factura,$descripcion,$descripcion_abrv,$modelo,$serie,$marca);
$valor       =  $objeto->agregar();

if ($valor=='existe') 
{
  echo  $message->mensaje("Registro duplicado","warning","Intente con otra descripción",2);
} 
else if($valor=='ok')
{
  echo  $message->mensaje("Buen Trabajo","success","Registro Existoso",2);
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