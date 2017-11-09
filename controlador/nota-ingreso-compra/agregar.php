<?php 


include'../../autoload.php';
include'../../session.php';

$funciones      =  new Funciones();
$message        =  new Message();
$stock          =  new Stock();

$correlativo    =  new Correlativo('NI','',1);

$num_mov        =  $correlativo->correlativo('NI','numero')+1;
$num_oc         =  $_POST['num_oc'];
$alm            =  $_SESSION[KEY.ALM];
$tipo_mov       =  "NI";
$tipo_oc        =  "OC";
$tran           =  "CL";
$doc_ref        =  $_POST['doc_ref'];
$num_ref        =  $_POST['num_ref'];
$item           =  $_POST['item'];
$saldo          =  $_POST['saldo'];


#Crear Cabecera Nota de Ingreso
$movalmcab    =  new Movalmcab($num_mov,$num_oc,$tipo_mov,$tipo_oc,$alm,$tran,$doc_ref,$num_ref);
 $valor       = $movalmcab->agregar();

#Crear Detalle Nota de Ingreso
foreach ($item as $key => $value_item) 
{

$value_saldo  = $saldo[$key];
$movalmdet =  new Movalmdet($num_mov,$num_oc,$tipo_mov,$tipo_oc,$alm,$tran,$value_item,$value_saldo);
 
               $movalmdet->agregar();

}

echo $message->mensaje('Nota de Ingreso #'.$num_mov.'','success','Creada Correctamente',2);

echo $message->send_url('../pages/nota-ingreso',3);



/*
#Actualizar Orden
foreach ($item as $key => $value_item) 
{

$value_saldo  = $saldo[$key];
echo $stock->update_orden($num_oc,$tipo_oc,$value_item,$value_saldo);

}








$movalmcab    =  new Movalmcab($num_mov,$num_oc,$tipo_mov,$tipo_oc,$alm,$tran,$doc_ref,$num_ref);
echo $movalmcab->agregar();

$movalmdet    =  new Movalmdet($num_mov,$num_oc,$tipo_mov,$tipo_oc,$alm,$tran);
echo $movalmdet->agregar();

echo $correlativo->actualizar_correlativo();

*/
 ?>