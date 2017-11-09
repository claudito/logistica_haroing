<?php 

class Articulo_ubicacion
{


protected $codigo_articulo;
protected $codigo;
protected $descripcion;


function __construct($codigo_articulo='',$codigo='',$descripcion='')
{
   $this->codigo_articulo   =  $codigo_articulo;
   $this->codigo            =  $codigo;
   $this->descripcion       =  $descripcion;
 
}

public function agregar()
{
   try {
    $modelo    = new Conexion();
    $conexion  = $modelo->get_conexion();
    $query     = "SELECT * FROM articulo_ubicacion WHERE codigo_articulo=:codigo_articulo";
    $statement = $conexion->prepare($query);
    $statement->bindParam(':codigo_articulo',$this->codigo_articulo);
    $statement->execute();
    $result   = $statement->fetchAll();
    
    if (count($result) >0)
    {
     return "existe";
    } 
    else 
    {
     $query     = "INSERT INTO articulo_ubicacion(codigo_articulo,codigo,descripcion)VALUES(:codigo_articulo,:codigo,:descripcion)";
    $statement = $conexion->prepare($query);
    $statement->bindParam(':codigo_articulo',$this->codigo_articulo);
    $statement->bindParam(':codigo',$this->codigo);
    $statement->bindParam(':descripcion',$this->descripcion);
    
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
       
   }
    catch (Exception $e) 
   {
      echo "ERROR: " . $e->getMessage();
   
   }
}


public function eliminar($id)
{
   try {
    $modelo    = new Conexion();
    $conexion  = $modelo->get_conexion();
     $query     = "DELETE FROM articulo_ubicacion WHERE id=:id";
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
     $query     = "UPDATE  articulo_ubicacion  SET codigo_articulo=:codigo_articulo,codigo=:codigo,descripcion=:descripcion WHERE  id=:id";
    $statement = $conexion->prepare($query);
    $statement->bindParam(':codigo_articulo',$this->codigo_articulo);
    $statement->bindParam(':codigo',$this->codigo);
    $statement->bindParam(':descripcion',$this->descripcion);
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





function lista()
{
   
	try {

	$modelo    = new Conexion();
	$conexion  = $modelo->get_conexion();
	$query     = "SELECT u.id, a.codigo AS codigo_articulo, a.descripcion as descripcion_articulo, u.codigo, u.descripcion
FROM articulo_ubicacion AS u
INNER JOIN articulo AS a ON u.codigo_articulo = a.codigo ORDER BY u.descripcion";
	$statement = $conexion->prepare($query); 
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
    $query     = "SELECT u.id, a.codigo AS codigo_articulo, a.descripcion as descripcion_articulo, u.codigo, u.descripcion
FROM articulo_ubicacion AS u
INNER JOIN articulo AS a ON u.codigo_articulo = a.codigo WHERE u.id=:id";
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