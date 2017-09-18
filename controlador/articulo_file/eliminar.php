<?php 

include'../../autoload.php';
include'../../session.php';

$message   =  new Message();
$funciones =  new Funciones();


$id        =  $_POST['id'];




if (count($_POST['id'])>0) 
{

foreach ($_POST['id'] as $key => $value) 
{
     
    $articulo_file  =  new Articulo_file();
    $filename       =  FOLDER_FILE.$articulo_file->consulta_file($value);
    if (unlink($filename)) 
    {   
    	$articulo_file->eliminar($value);
    	echo $message->mensaje('Buen Trabajo','success','Archivo Eliminado',2);
    } 
    else 
    {
    	echo $message->mensaje('Error','error','Consulte al área de soporte.',2);
    }
    	
}

} 
else 
{
 echo $message->mensaje('Lista Vacía','warning','Marque una o más casillas.',2);
}



 ?>