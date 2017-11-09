<?php 


class Stock
{

  protected $alm;
  protected $codigo;
  protected $descripcion;
  protected $cantidad;
  protected $cant_min;
  protected $cant_max;
  protected $costo_prom;


function __construct($alm='',$codigo='',$descripcion='',$cantidad='',$cant_min='',$cant_max='',$costo_prom='')
{
 
  $this->alm          =  $alm;
  $this->codigo       =  $codigo;
  $this->descripcion  =  $descripcion;
  $this->cantidad     =  $cantidad;
  $this->cant_min     =  $cant_min;
  $this->cant_max     =  $cant_max;
  $this->cant_max     =  $cant_max;
  $this->costo_prom   =  $costo_prom;



}

public function actualizar()
{
   try {
    $modelo    = new Conexion();
    $conexion  = $modelo->get_conexion();
    $query     = "UPDATE  stock  SET cant_min=:cant_min,cant_max=:cant_max,costo_prom=:costo_prom WHERE codigo=:codigo AND alm=:alm";
    $statement = $conexion->prepare($query);
    $statement->bindParam(':cant_min',$this->cant_min);
    $statement->bindParam(':cant_max',$this->cant_max);
    $statement->bindParam(':costo_prom',$this->costo_prom);
    $statement->bindParam(':codigo',$this->codigo);
    $statement->bindParam(':alm',$this->alm);
    if(!$statement)
    {
    return "error";
    }
    else
    {
    $statement->execute();
    return "ok";
    }
       
   }
    catch (Exception $e) 
   {
      echo "ERROR: " . $e->getMessage();
   
   }
}

function lista()
{

try {
  
$modelo    = new Conexion();
$conexion  = $modelo->get_conexion();
$query     = "SELECT s.alm,s.codigo,a.descripcion,s.cantidad,s.cant_min,s.cant_max,s.costo_prom
 FROM stock AS s INNER JOIN articulo AS a ON s.codigo=a.codigo";
$statement = $conexion->prepare($query);
if ($statement) 
{
   $statement->execute();
   $result = $statement->fetchAll();
   return $result;
} 
else 
{
   return "error";
}



} catch (Exception $e) {
  
  echo "Error:".$e->getMessage();
}


}

public function consulta($codigo,$campo,$alm)
{
    try {
        
    $modelo    = new Conexion();
    $conexion  = $modelo->get_conexion();
    $query     = "SELECT s.id,s.alm,s.codigo,a.descripcion,s.cantidad,s.cant_min,s.cant_max,s.costo_prom
 FROM stock AS s INNER JOIN articulo AS a ON s.codigo=a.codigo WHERE s.codigo=:codigo";
    $statement = $conexion->prepare($query);
    $statement->bindParam(':codigo',$codigo);
    $statement->execute();
    $result   = $statement->fetch();
    return $result[$campo];
    } catch (Exception $e) {
        echo "ERROR: " . $e->getMessage();
    }
}





function update_orden($num_oc,$tipo,$item,$saldo)
{

try {
    $modelo    = new Conexion();
    $conexion  = $modelo->get_conexion();
     $query     = "UPDATE  comovd  SET  saldo=saldo-:saldo  WHERE  tipo=:tipo AND numero=:num_oc AND item=:item";
    $statement = $conexion->prepare($query);
    $statement->bindParam(':num_oc',$num_oc);
    $statement->bindParam(':tipo',$tipo);
    $statement->bindParam(':item',$item);
    $statement->bindParam(':saldo',$saldo);
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


function update_stock()
{

}







}



 ?>