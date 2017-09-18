<?php 

class Aprobacion_documentos
{

protected $tipo;
protected $numero;
protected $firma;
protected $estado;
protected $usuario;

function __construct($tipo='',$numero='',$firma='',$estado='',$usuario='')
{
 
 $this->tipo    = $tipo;
 $this->numero  = $numero;
 $this->firma   = $firma; 
 $this->estado  = $estado;
 $this->usuario = $usuario;

}

public function agregar()
{
   try {
    $modelo    = new Conexion();
    $conexion  = $modelo->get_conexion();
    $query     = "SELECT * FROM aprobacion_documentos WHERE tipo=:tipo AND nro_documento=:numero 
                  AND firma=:firma";
    $statement = $conexion->prepare($query);
    $statement->bindParam(':tipo',$this->tipo);
    $statement->bindParam(':numero',$this->numero);
    $statement->bindParam(':firma',$this->firma);
    $statement->execute();
    $result   = $statement->fetchAll();
    
    if (count($result) >0)
    {
     return "existe";
    } 
    else 
    {

    $query = "INSERT INTO aprobacion_documentos(tipo,nro_documento,firma)
               VALUES(:tipo,:numero,:firma)";
    $statement = $conexion->prepare($query);
    $statement->bindParam(':numero',$this->numero);
    $statement->bindParam(':tipo',$this->tipo);
    $statement->bindParam(':firma',$this->firma);
    if($statement)
    {
    $statement->execute();
    return "ok";
    }
    else
    {
    return "error";
    }

    }
       
   }
    catch (Exception $e) 
   {
      echo "ERROR: " . $e->getMessage();
   
   }
}



public function actualizar()
{
   try {
    $modelo    = new Conexion();
    $conexion  = $modelo->get_conexion();
    $query = "UPDATE aprobacion_documentos  SET estado=:estado,id_usuario=:usuario,
    fecha_update=:fecha_update
     WHERE tipo=:tipo AND nro_documento=:numero AND firma=:firma"; 
    $statement = $conexion->prepare($query);
    $statement->bindParam(':numero',$this->numero);
    $statement->bindParam(':tipo',$this->tipo);
    $statement->bindParam(':usuario',$this->usuario);
    $statement->bindParam(':estado',$this->estado);
    $statement->bindParam(':firma',$this->firma);
    $statement->bindParam(':fecha_update',date('Y-m-d H:i:s'));

    if($statement)
    {
    $statement->execute();
    return "ok";
    }
    else
    {
    return "error";
    }
       
   }
    catch (Exception $e) 
   {
      echo "ERROR: " . $e->getMessage();
   
   }
}



function fill_firmas($tipo)
{

if ($tipo=='RQ' || $tipo=='RS') 
{


$plantilla        =  new Aprobacion_documentos();

foreach ($plantilla->plantilla($tipo) as $key_plantilla => $value_plantilla) 
{ 
$requisc =  new Requisc();
foreach ($requisc->lista($tipo) as $key_orden => $value_orden) 
{

$objeto  =  new Aprobacion_documentos($value_plantilla['tipo'],$value_orden['numero'],$value_plantilla['firma']);
 $objeto->agregar();

}

}



} 
else if ($tipo=='OC' || $tipo=='OS') 
{


$plantilla        =  new Aprobacion_documentos();

foreach ($plantilla->plantilla($tipo) as $key_plantilla => $value_plantilla) 
{ 
$comovc =  new Comovc();
foreach ($comovc->lista($tipo) as $key_orden => $value_orden) 
{

$objeto  =  new Aprobacion_documentos($value_plantilla['tipo'],$value_orden['numero'],$value_plantilla['firma']);
 $objeto->agregar();

}

}


}
else
{
  return "no existe"; 
}
  
}


function lista($tipo)
{
   
  try {

  $modelo    = new Conexion();
  $conexion  = $modelo->get_conexion();
  $query     = "SELECT d.nro_documento,
firma_1.estado firma_1,firma_1.id_usuario usuario_firma_1,
firma_2.estado firma_2,firma_2.id_usuario usuario_firma_2,
firma_3.estado firma_3,firma_3.id_usuario usuario_firma_3 FROM aprobacion_documentos d  
INNER JOIN (SELECT * FROM aprobacion_documentos WHERE  tipo=:tipo AND firma=1) AS firma_1 ON d.nro_documento=firma_1.nro_documento
INNER JOIN (SELECT * FROM aprobacion_documentos WHERE  tipo=:tipo AND firma=2) AS firma_2 ON d.nro_documento=firma_2.nro_documento
INNER JOIN (SELECT * FROM aprobacion_documentos WHERE  tipo=:tipo AND firma=3) AS firma_3 ON d.nro_documento=firma_3.nro_documento
WHERE  d.tipo=:tipo
GROUP BY d.nro_documento;

";
  $statement = $conexion->prepare($query); 
  $statement->bindParam(':tipo',$tipo);
  $statement->execute();
  $result = $statement->fetchAll();
  return $result;
  } catch (Exception $e) {
  echo "ERROR: " . $e->getMessage();
  }


}


function consulta($tipo,$numero,$campo)
{
   
  try {

  $modelo    = new Conexion();
  $conexion  = $modelo->get_conexion();
  $query     = "SELECT d.nro_documento,
firma_1.estado firma_1,firma_1.id_usuario usuario_firma_1,
firma_2.estado firma_2,firma_2.id_usuario usuario_firma_2,
firma_3.estado firma_3,firma_3.id_usuario usuario_firma_3 FROM aprobacion_documentos d  
INNER JOIN (SELECT * FROM aprobacion_documentos WHERE  tipo=:tipo AND firma=1) AS firma_1 ON d.nro_documento=firma_1.nro_documento
INNER JOIN (SELECT * FROM aprobacion_documentos WHERE  tipo=:tipo AND firma=2) AS firma_2 ON d.nro_documento=firma_2.nro_documento
INNER JOIN (SELECT * FROM aprobacion_documentos WHERE  tipo=:tipo AND firma=3) AS firma_3 ON d.nro_documento=firma_3.nro_documento
WHERE  d.tipo=:tipo AND d.nro_documento=:numero
GROUP BY d.nro_documento;";
  $statement = $conexion->prepare($query); 
  $statement->bindParam(':tipo',$tipo);
  $statement->bindParam(':numero',$numero);
  $statement->execute();
  $result = $statement->fetch();
  return $result[$campo];
  } catch (Exception $e) {
  echo "ERROR: " . $e->getMessage();
  }


}


function estado_firma($tipo,$numero,$firma,$campo)
{
   
  try {
  
  $estado    = 1;
  $modelo    = new Conexion();
  $conexion  = $modelo->get_conexion();
  $query     = "SELECT  * FROM aprobacion_documentos WHERE tipo=:tipo AND nro_documento=:numero
           AND  firma=:firma AND estado=:estado";
  $statement = $conexion->prepare($query); 
  $statement->bindParam(':tipo',$tipo);
  $statement->bindParam(':numero',$numero);
  $statement->bindParam(':firma',$firma);
  $statement->bindParam(':estado',$estado);
  $statement->execute();
  $result = $statement->fetch();
  return $result[$campo];
  } catch (Exception $e) {
  echo "ERROR: " . $e->getMessage();
  }


}








function plantilla($tipo)
{
   
  try {

  $modelo    = new Conexion();
  $conexion  = $modelo->get_conexion();
  $query     = "SELECT * FROM aprobacion_documentos_plantilla WHERE tipo=:tipo ORDER BY firma";
  $statement = $conexion->prepare($query); 
  $statement->bindParam(':tipo',$tipo);
  $statement->execute();
  $result = $statement->fetchAll();
  return $result;
  } catch (Exception $e) {
  echo "ERROR: " . $e->getMessage();
  }


}






}

?>