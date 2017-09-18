<?php 

include'../../autoload.php';
include'../../session.php';

$message     =  new Message();
$funciones   =  new Funciones();

if ($_FILES['firma']['size']<=MAX_FILE_SIZE) 
{

if ($funciones->tipo_archivo($_FILES['firma']['type'])=='ok') 
{
    
  if (isset($_POST['usuario']) AND isset($_FILES['firma']) ) 
  {
  	  
	 $idusuario      	=  $funciones->validar_xss($_POST['usuario']);

	if (strlen($idusuario)>0) 
	{
    
    $fecha              = date('Y-m-d-H-i-s').KEY;
	$extension          = $funciones->tipo_extension($_FILES['firma']['type']);
	$archivo            = md5($_FILES['firma']['name'].$fecha).'.'.$extension;
	$archivo_temporal   = $_FILES['firma']['tmp_name'];
	$destino            = "../../docs/pdf/img/firma/".$archivo;
	
	$usuario  =  new Usuario();

	if (count($usuario->consulta($idusuario,'img_firma'))>0) 
	{   
	   $filename  = FOLDER_FIRMA.$usuario->consulta($idusuario,'img_firma');
	   unlink($filename);   
	}

	if (move_uploaded_file($archivo_temporal,$destino))
	{
	
    $usuario  =  new Usuario();
    $usuario->actualizar_firma($idusuario,$archivo);

	echo $message->mensaje("Firma Actualizada","success","",2);


	} 
	else
	{
	echo $message->mensaje("Error al subir el archivo","warning","No se ha podido cargar el archivo.",2);
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
  


}

else
{
   echo $message->mensaje("Archivo no permitido","warning","Verifique la extensión del archivo",2);
}

} 
else
{
  echo $message->mensaje("Archivo Pesado","error","Verifique el tamaño del archivo",2);
}




 ?>