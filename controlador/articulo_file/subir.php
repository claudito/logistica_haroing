<?php 

include'../../autoload.php';
include'../../session.php';

$message     =  new Message();
$funciones   =  new Funciones();

if ($_FILES['archivo']['size']<=MAX_FILE_SIZE) 
{

if ($funciones->tipo_archivo($_FILES['archivo']['type'])=='ok') 
{
    
  if (isset($_POST['nombre']) AND isset($_FILES['archivo']) AND isset($_POST['id'])) 
  {
  	  
	 $nombre      	=  $funciones->validar_xss($_POST['nombre']);
	$id_articulo 	=  $funciones->validar_xss($_POST['id']);

	if (strlen($nombre)>0 AND strlen($id_articulo)>0) 
	{
    
    $articulo_file  =  new Articulo_file();
	if ($articulo_file->consulta($id_articulo,$nombre,'nombre')==$nombre) 
	{
	 
	  echo  $message->mensaje("Nombre Duplicado","warning","Verifique de nuevo",2);	
	}
	else
	{
	
	$fecha     = date('Y-m-d-H-i-s').KEY;
	$extension = $funciones->tipo_extension($_FILES['archivo']['type']);
	$archivo            = md5($nombre.$fecha).'.'.$extension;
	$archivo_temporal   = $_FILES['archivo']['tmp_name'];
	$destino            = "../../upload/articulo_file/".$archivo;
	if (move_uploaded_file($archivo_temporal,$destino)) 
	{
	$objeto 		= new Articulo_file($nombre,$archivo,$id_articulo);
	$valor 			= $objeto->agregar();
	echo $message->mensaje("Buen Trabajo","success","Archivo Cargado Correctamente",2);
	} 
	else 
	{
	echo $message->mensaje("Error al subir el archivo","warning","No se ha podido cargar el archivo.",2);
	}


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