<?php 

class Movalmdet
{

protected $num_mov;
protected $num_oc;
protected $tipo_mov;
protected $tipo_oc;
protected $alm;
protected $tran;
protected $item;
protected $cantidad;

function __construct($num_mov='',$num_oc='',$tipo_mov='',$tipo_oc='',$alm='',$tran='',$item='',$cantidad='')
{
   $this->num_mov       =  $num_mov;
   $this->num_oc        =  $num_oc;
   $this->tipo_mov      =  $tipo_mov;
   $this->tipo_oc       =  $tipo_oc;
   $this->alm           =  $alm;
   $this->tran          =  $tran;
   $this->item          =  $item;
   $this->cantidad      =  $cantidad;
   
}

public function agregar()
{
   try {
    $modelo    = new Conexion();
    $conexion  = $modelo->get_conexion();
    $query     = "SELECT * FROM movalmdet WHERE numero=:num_mov AND tipo=:tipo_mov AND alm=:alm AND item=:item";
    $statement = $conexion->prepare($query);
    $statement->bindParam(':num_mov',$this->num_mov);
    $statement->bindParam(':tipo_mov',$this->tipo_mov);
    $statement->bindParam(':alm',$this->alm);
    $statement->bindParam(':item',$this->item);
    $statement->execute();
    $result   = $statement->fetchAll();
    
    if (count($result) >0)
    {
     return "existe";
    } 
    else 
    {
     $query     = "INSERT INTO movalmdet(alm,numero,tran,item,codigo,descripcion,unidad,cantidad,precio,fecha,centro_costo,ot,tipo)
 SELECT  :alm,:num_mov,:tran,item,codigo,descripcion,unidad,:cantidad,precio,fecha,centro_costo,ot,:tipo_mov  FROM  comovd WHERE numero=:num_oc AND tipo=:tipo_oc AND item=:item";
    
    $statement = $conexion->prepare($query);
    $statement->bindParam(':num_mov',$this->num_mov);
    $statement->bindParam(':num_oc',$this->num_oc);
    $statement->bindParam(':tran',$this->tran);
    $statement->bindParam(':tipo_mov',$this->tipo_mov);
    $statement->bindParam(':tipo_oc',$this->tipo_oc);
    $statement->bindParam(':alm',$this->alm);
    $statement->bindParam(':item',$this->item);
    $statement->bindParam(':cantidad',$this->cantidad);
    
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


}



 ?>