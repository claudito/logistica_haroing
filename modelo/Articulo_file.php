<?php 

class Articulo_file
{


protected $nombre;
protected $ruta;
protected $id_articulo;

function __construct($nombre='',$ruta='',$id_articulo='')
{
   $this->nombre        =  $nombre;
   $this->ruta          =  $ruta;
   $this->id_articulo   =  $id_articulo;
 
}

public function agregar()
{
   try {
    $modelo    = new Conexion();
    $conexion  = $modelo->get_conexion();
    $query     = "SELECT * FROM articulo_file WHERE nombre=:nombre AND id_articulo=:id_articulo";
    $statement = $conexion->prepare($query);
    $statement->bindParam(':nombre',$this->nombre);
    $statement->bindParam(':id_articulo',$this->id_articulo);
    $statement->execute();
    $result   = $statement->fetchAll();
    
    if (count($result) >0)
    {
     return "existe";
    } 
    else 
    {
     $query     = "INSERT INTO articulo_file(nombre,ruta,id_articulo)VALUES(:nombre,:ruta,:id_articulo)";
    $statement = $conexion->prepare($query);
    $statement->bindParam(':nombre',$this->nombre);
    $statement->bindParam(':ruta',$this->ruta);
    $statement->bindParam(':id_articulo',$this->id_articulo);
    
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
     $query     = "DELETE FROM articulo_file WHERE id=:id";
    $statement = $conexion->prepare($query);
    $statement->bindParam(':id',$id);
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


public function actualizar($id)
{
   try {
    $modelo    = new Conexion();
    $conexion  = $modelo->get_conexion();
     $query     = "UPDATE  articulo_file  SET nombre=:nombre,ruta=:ruta,id_articulo=:id_articulo WHERE  id=:id";
    $statement = $conexion->prepare($query);
    $statement->bindParam(':nombre',$this->nombre);
    $statement->bindParam(':ruta',$this->ruta);
    $statement->bindParam(':id_articulo',$this->id_articulo);
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





function lista($id)
{
   
	try {

	$modelo    = new Conexion();
	$conexion  = $modelo->get_conexion();
	$query     = "SELECT * FROM articulo_file WHERE  id_articulo='".$id."'";
	$statement = $conexion->prepare($query);
  $statement->bindParam(':id',$this->id); 
	$statement->execute();
	$result = $statement->fetchAll();
	return $result;
	} catch (Exception $e) {
	echo "ERROR: " . $e->getMessage();
	}


}


public function consulta($id,$nombre,$campo)
{
    try {
        
    $modelo    = new Conexion();
    $conexion  = $modelo->get_conexion();
    $query     = "SELECT * FROM articulo_file WHERE  id_articulo=:id AND nombre=:nombre";
    $statement = $conexion->prepare($query);
    $statement->bindParam(':id',$id);
    $statement->bindParam(':nombre',$nombre);
    $statement->execute();
    $result   = $statement->fetch();
    return $result[$campo];
    } catch (Exception $e) {
        echo "ERROR: " . $e->getMessage();
    }
}




public function consulta_file($id)
{
    try {
        
    $modelo    = new Conexion();
    $conexion  = $modelo->get_conexion();
    $query     = "SELECT * FROM articulo_file WHERE  id=:id";
    $statement = $conexion->prepare($query);
    $statement->bindParam(':id',$id);
    $statement->execute();
    $result   = $statement->fetch();
    return $result['ruta'];
    } catch (Exception $e) {
        echo "ERROR: " . $e->getMessage();
    }
}




}



 ?>