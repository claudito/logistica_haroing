<?php 

include'../../autoload.php';
include'../../session.php';

$message     =  new Message();
$funciones   =  new Funciones();

if (isset($_POST['id']) AND isset($_POST['cant_min']) AND isset($_POST['cant_max']) AND isset($_POST['costo_prom'])) 
{
    $id          	=  $funciones->validar_xss($_POST['id']);
    $cant_min       =  $funciones->validar_xss($_POST['cant_min']);
    $cant_max 		=  $funciones->validar_xss($_POST['cant_max']);
    $costo_prom 	=  $funciones->validar_xss($_POST['costo_prom']);

	if (strlen($id)>0 AND strlen($cant_min)>0 AND strlen($cant_max)>0 AND strlen($costo_prom)>0) 
	{
		$objeto      =  new Stock('01',$id,'','',$cant_min,$cant_max,$costo_prom);
		$valor       =  $objeto->actualizar();

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