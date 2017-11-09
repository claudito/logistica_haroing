<?php 

include'../../autoload.php';
include'../../session.php';

$message   =  new Message();
$funciones =  new Funciones();

if (isset($_POST['codigo']) AND isset($_POST['descripcion']) AND isset($_POST['ni']) AND isset($_POST['ns'])) 
{
 
$codigo       =  $funciones->validar_xss($_POST['codigo']);
$descripcion  =  $funciones->validar_xss($_POST['descripcion']);
$ni  		  =  $funciones->validar_xss($_POST['ni']);
$ns 		  =  $funciones->validar_xss($_POST['ns']);

if (strlen($codigo)>0 AND strlen($descripcion)>0 AND strlen($ni)>0 AND strlen($ns)>0 ) 
{
  
$objeto      =  new Transaccion_tipo($codigo,$descripcion,$ni,$ns);
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