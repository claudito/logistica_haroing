<?php 

class Guia_detalle_salida
{


protected $numero;
protected $tran;
protected $item;
protected $codigo;
protected $descripcion;
protected $unidad;
protected $cantidad;
protected $precio;
protected $fecha;
protected $centro_costo;
protected $ot;
protected $tipo;

function __construct($numero='',$tran='',$item='',$codigo='',$descripcion='',$unidad='',$cantidad='',$precio='',$fecha='',$centro_costo='',$ot='',$tipo='')
{
   
   $this->numero            =  $numero;
   $this->tran              =  $tran;
   $this->item              =  $item;
   $this->codigo            =  $codigo;
   $this->descripcion       =  $descripcion;
   $this->unidad            =  $unidad;
   $this->cantidad          =  $cantidad;
   $this->precio            =  $precio;
   $this->fecha             =  $fecha;
   $this->centro_costo      =  $centro_costo;
   $this->ot                =  $ot;
   $this->tipo              =  $tipo;
   
}

function item($tipo,$numero)
{


  try {

  $modelo    = new Conexion();
  $conexion  = $modelo->get_conexion();
  $query     = "SELECT  * FROM mov_guiadet WHERE tipo=:tipo AND numero=:numero
                ORDER BY item DESC limit 1";
  $statement = $conexion->prepare($query);
  $statement->bindParam(':tipo',$tipo);
  $statement->bindParam(':numero',$numero);
  $statement->execute();
  $result   = $statement->fetch();
  return $result['item']+1;
  
  } 
  catch (Exception $e)
  {
  echo "ERROR: " . $e->getMessage();
  }


}

public function agregar()
{

$modelo    = new Conexion();
$conexion  = $modelo->get_conexion();
$query     = "INSERT INTO mov_guiadet(numero,tran,item,codigo,descripcion,unidad,cantidad,precio,fecha,centro_costo,ot,tipo)VALUES(:numero,:tran,:item,:codigo,:descripcion,:unidad,:cantidad,:precio,:fecha,:centro_costo,:ot,:tipo)";
    $statement = $conexion->prepare($query);
    $statement->bindParam(':numero',$this->numero);
    $statement->bindParam(':tran',$this->tran);
    $statement->bindParam(':item',$this->item($this->tipo,$this->numero));
    $statement->bindParam(':codigo',$this->codigo);
    $statement->bindParam(':descripcion',$this->descripcion);
    $statement->bindParam(':unidad',$this->unidad);
    $statement->bindParam(':cantidad',$this->cantidad);
    $statement->bindParam(':precio',$this->precio);
    $statement->bindParam(':fecha',$this->fecha);
    $statement->bindParam(':centro_costo',$this->centro_costo);
    $statement->bindParam(':ot',$this->ot);
    $statement->bindParam(':tipo',$this->tipo);
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

public function eliminar($id)
{
   try {
    $modelo    = new Conexion();
    $conexion  = $modelo->get_conexion();
     $query     = "DELETE FROM mov_guiadet WHERE id=:id";
    $statement = $conexion->prepare($query);
    $statement->bindParam(':id',$id);
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

public function actualizar($id)
{
   try {
    $modelo    = new Conexion();
    $conexion  = $modelo->get_conexion();
     $query     = "UPDATE  mov_guiadet  SET tran=:tran,codigo=:codigo,descripcion=:descripcion,unidad=:unidad,cantidad=:cantidad,precio=:precio,fecha=:fecha,centro_costo=:centro_costo,ot=:ot WHERE  id=:id";
    $statement = $conexion->prepare($query);
    $statement->bindParam(':tran',$this->tran);
    $statement->bindParam(':codigo',$this->codigo);
    $statement->bindParam(':descripcion',$this->descripcion);
    $statement->bindParam(':unidad',$this->unidad);
    $statement->bindParam(':cantidad',$this->cantidad);
    $statement->bindParam(':precio',$this->precio);
    $statement->bindParam(':fecha',$this->fecha);
    $statement->bindParam(':centro_costo',$this->centro_costo);
    $statement->bindParam(':ot',$this->ot);
    $statement->bindParam(':id',$id);
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

function lista($numero,$tipo)
{
   
  try {

  $modelo    = new Conexion();
  $conexion  = $modelo->get_conexion();
  $query     = "SELECT m.id, m.numero, t.codigo AS tipo_transaccion, t.descripcion AS transaccion, m.item, a.codigo AS codigo_articulo, a.descripcion AS descripcion_articulo, u.codigo AS codigo_unidad, u.descripcion AS unidad, m.cantidad, m.precio, m.fecha, c.codigo AS codigo_cc, c.descripcion AS centro_costo, o.codigo AS codigo_ot, o.descripcion AS orden_trabajo, m.tipo
FROM mov_guiadet AS m
LEFT JOIN transacciones_mov AS t ON m.tran = t.codigo
LEFT JOIN articulo AS a ON m.codigo = a.codigo
LEFT JOIN unidad AS u ON m.unidad = u.descripcion
LEFT JOIN centro_costo AS c ON m.centro_costo = c.codigo
LEFT JOIN ord_fab AS o ON m.ot = o.codigo
WHERE m.numero =:numero AND m.tipo = :tipo ORDER BY item";
  $statement = $conexion->prepare($query);
  $statement->bindParam(':numero',$numero);
  $statement->bindParam(':tipo',$tipo);
  $statement->execute();
  $result = $statement->fetchAll();
  return $result;
  } catch (Exception $e) {
  echo "ERROR: " . $e->getMessage();
  }


}

public function consulta($id,$campo)
{
    try {
        
    $modelo    = new Conexion();
    $conexion  = $modelo->get_conexion();
    $query     = "SELECT m.id, m.numero, t.codigo AS tipo_transaccion, t.descripcion AS transaccion, m.item, a.codigo AS codigo_articulo, a.descripcion AS descripcion_articulo, u.codigo AS codigo_unidad, u.descripcion AS unidad, m.cantidad, m.precio, m.fecha, c.codigo AS codigo_cc, c.descripcion AS centro_costo, o.codigo AS codigo_ot, o.descripcion AS orden_trabajo, m.tipo 
FROM mov_guiadet AS m
LEFT JOIN transacciones_mov AS t ON m.tran = t.codigo
LEFT JOIN articulo AS a ON m.codigo = a.codigo
LEFT JOIN unidad AS u ON m.unidad = u.descripcion
LEFT JOIN centro_costo AS c ON m.centro_costo = c.codigo
LEFT JOIN ord_fab AS o ON m.ot = o.codigo
WHERE m.id=:id";
    $statement = $conexion->prepare($query);
    $statement->bindParam(':id',$id);
    $statement->execute();
    $result   = $statement->fetch();
    return $result[$campo];
    } catch (Exception $e) {
        echo "ERROR: " . $e->getMessage();
    }
}

}



 ?>