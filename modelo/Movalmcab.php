<?php 

class Movalmcab
{

protected $num_mov;
protected $num_oc;
protected $tipo_mov;
protected $tipo_oc;
protected $alm;
protected $tran;
protected $doc_ref;
protected $num_ref;

function __construct($num_mov='',$num_oc='',$tipo_mov='',$tipo_oc='',$alm='',$tran='',$doc_ref='',$num_ref='')
{
   $this->num_mov       =  $num_mov;
   $this->num_oc        =  $num_oc;
   $this->tipo_mov      =  $tipo_mov;
   $this->tipo_oc       =  $tipo_oc;
   $this->alm           =  $alm;
   $this->tran          =  $tran;
   $this->doc_ref       =  $doc_ref;
   $this->num_ref       =  $num_ref;
   
}

public function agregar()
{
   try {
    $modelo    = new Conexion();
    $conexion  = $modelo->get_conexion();
    $query     = "SELECT * FROM movalmcab WHERE numero=:num_mov AND tipo=:tipo_mov AND alm=:alm";
    $statement = $conexion->prepare($query);
    $statement->bindParam(':num_mov',$this->num_mov);
    $statement->bindParam(':tipo_mov',$this->tipo_mov);
    $statement->bindParam(':alm',$this->alm);
    $statement->execute();
    $result   = $statement->fetchAll();
    
    if (count($result) >0)
    {
     return "existe";
    } 
    else 
    {
     $query     = "INSERT INTO movalmcab(alm,numero,doc_oc,tran,doc_ref,num_ref,id_usuario,id_proveedor,fecha_inicio,fecha_fin,ot,centro_costo,area,tipo)
SELECT  :alm,:num_mov,:num_oc,:tran,:doc_ref,:num_ref,id_usuario,id_proveedor,fecha_inicio,fecha_fin,ot,centro_costo,area,:tipo_mov  FROM  comovc  WHERE numero=:num_oc AND tipo=:tipo_oc ";
    
    $statement = $conexion->prepare($query);
    $statement->bindParam(':num_mov',$this->num_mov);
    $statement->bindParam(':doc_ref',$this->doc_ref);
    $statement->bindParam(':num_ref',$this->num_ref);
    $statement->bindParam(':num_oc',$this->num_oc);
    $statement->bindParam(':tran',$this->tran);
    $statement->bindParam(':tipo_mov',$this->tipo_mov);
    $statement->bindParam(':tipo_oc',$this->tipo_oc);
    $statement->bindParam(':alm',$this->alm);
    
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



function lista($tipo)
{
   
  try {

  $modelo    = new Conexion();
  $conexion  = $modelo->get_conexion();
  $query     = "SELECT m.alm,m.numero,m.tran,m.doc_ref,m.num_ref,m.doc_oc,CONCAT(u.nombres,' ',u.apellidos)as fullname,p.ruc,p.razon_social,m.fecha_fin,
m.centro_costo,a.descripcion as area,m.tipo,m.estado FROM movalmcab as m 
INNER JOIN usuario AS u ON m.id_usuario=u.id
INNER JOIN proveedor AS p ON m.id_proveedor=p.id
INNER JOIN area AS a ON m.area=a.codigo
WHERE m.tipo=:tipo;";
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
  $query     = "SELECT m.alm,m.numero,m.tran,m.doc_ref,m.num_ref,m.doc_oc,CONCAT(u.nombres,' ',u.apellidos)as fullname,p.ruc,p.razon_social,m.fecha_fin,
m.centro_costo,a.descripcion as area,m.tipo,m.estado FROM movalmcab as m 
INNER JOIN usuario AS u ON m.id_usuario=u.id
INNER JOIN proveedor AS p ON m.id_proveedor=p.id
INNER JOIN area AS a ON m.area=a.codigo
WHERE m.tipo=:tipo;";
  $statement = $conexion->prepare($query); 
  $statement->bindParam(':tipo',$tipo);
  $statement->execute();
  $result = $statement->fetch();
  return $result[$campo];
  } catch (Exception $e) {
  echo "ERROR: " . $e->getMessage();
  }


}






}



 ?>