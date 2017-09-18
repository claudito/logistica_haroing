<?php 

include'../../autoload.php';
include'../../session.php';

$aprobacion_documentos  =  new Aprobacion_documentos();
$message                =  new Message();
$usuario_tipo           =  new Usuario_tipo();

$numero                 =  $_POST['numero'];
$tipo                   =  $_POST['tipo'];
$usuario                =  $_SESSION[KEY.ID];

$solicitante            =  $usuario_tipo->consulta($usuario,'solicitante');
$compras                =  $usuario_tipo->consulta($usuario,'compras');
$jefe_area              =  $usuario_tipo->consulta($usuario,'jefe_area');
$gerente                =  $usuario_tipo->consulta($usuario,'gerente');

$estado_firma_1         =  (isset($_POST['firma_1']))? ($_POST['firma_1']=='on') ?1:0 : 0 ; 
$estado_firma_2         =  (isset($_POST['firma_2']))? ($_POST['firma_2']=='on') ?1:0 : 0 ;
$estado_firma_3         =  (isset($_POST['firma_3']))? ($_POST['firma_3']=='on') ?1:0 : 0 ;
$usuario_firma_1        =  (isset($_POST['usuario_firma_1'])) ? $_POST['usuario_firma_1'] : 0 ;
$usuario_firma_2        =  (isset($_POST['usuario_firma_2'])) ? $_POST['usuario_firma_2'] : 0 ;
$usuario_firma_3        =  (isset($_POST['usuario_firma_3'])) ? $_POST['usuario_firma_3'] : 0 ;

if ($tipo=='RQ' || $tipo=='RS') 
{
  
 #Solicitante
if ($solicitante==1) 
{
if ($estado_firma_1==1)
{
$objeto  =  new Aprobacion_documentos($tipo,$numero,1,$estado_firma_1,$usuario_firma_1);
$objeto->actualizar();
} 
else 
{
$objeto  =  new Aprobacion_documentos($tipo,$numero,1,$estado_firma_1,0);
$objeto->actualizar();
} 
} 

 #Jefe de Área
if ($jefe_area==1) 
{
if ($estado_firma_2==1)
{
$objeto  =  new Aprobacion_documentos($tipo,$numero,2,$estado_firma_2,$usuario_firma_2);
$objeto->actualizar();
} 
else 
{
$objeto  =  new Aprobacion_documentos($tipo,$numero,2,$estado_firma_2,0);
$objeto->actualizar();
} 
} 

#Compras
if ($compras==1) 
{
if ($estado_firma_3==1)
{
$objeto  =  new Aprobacion_documentos($tipo,$numero,3,$estado_firma_3,$usuario_firma_3);
$objeto->actualizar();
} 
else 
{
$objeto  =  new Aprobacion_documentos($tipo,$numero,3,$estado_firma_3,0);
$objeto->actualizar();
} 
} 

echo $message->mensaje('Firmas Actualizadas','success','',2);



} 
else if ($tipo=='OC' || $tipo=='OS') 
{
    
#Gerente N°1
if ($gerente==1) 
{
if ($estado_firma_1==1)
{
$objeto  =  new Aprobacion_documentos($tipo,$numero,1,$estado_firma_1,$usuario_firma_1);
$objeto->actualizar();
} 
else 
{
$objeto  =  new Aprobacion_documentos($tipo,$numero,1,$estado_firma_1,0);
$objeto->actualizar();
} 
} 

#Gerente N°2
if ($gerente==1) 
{
if ($estado_firma_2==1)
{
$objeto  =  new Aprobacion_documentos($tipo,$numero,2,$estado_firma_2,$usuario_firma_2);
$objeto->actualizar();
} 
else 
{
$objeto  =  new Aprobacion_documentos($tipo,$numero,2,$estado_firma_2,0);
$objeto->actualizar();
} 
} 

#Compras
if ($compras==1) 
{
if ($estado_firma_3==1)
{
$objeto  =  new Aprobacion_documentos($tipo,$numero,3,$estado_firma_3,$usuario_firma_3);
$objeto->actualizar();
} 
else 
{
$objeto  =  new Aprobacion_documentos($tipo,$numero,3,$estado_firma_3,0);
$objeto->actualizar();
} 
} 

echo $message->mensaje('Firmas Actualizadas','success','',2);


}
else
{
echo $message->mensaje('No existe el tipo de documento','warning','',2);
}




 ?>