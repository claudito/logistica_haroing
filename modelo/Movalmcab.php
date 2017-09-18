<?php 

class Movalmcab
{


protected $numero;
protected $tipo;
protected $alm;
protected $orden;


function __construct($numero='',$tipo='',$alm='',$orden='')
{
   $this->numero        =  $numero;
   $this->tipo          =  $tipo;
   $this->alm           =  $alm;

   
}

public function agregar()
{
   try {
    $modelo    = new Conexion();
    $conexion  = $modelo->get_conexion();
    $query     = "SELECT * FROM movalmcab WHERE numero=:numero AND tipo=:tipo";
    $statement = $conexion->prepare($query);
    $statement->bindParam(':numero',$this->numero);
    $statement->bindParam(':tipo',$this->tipo);
    $statement->execute();
    $result   = $statement->fetchAll();
    
    if (count($result) >0)
    {
     return "existe";
    } 
    else 
    {
     $query     = "INSERT INTO movalmcab(numero,id_usuario,id_proveedor,fecha_inicio,fecha_fin,comentario,centro_costo,ot,area,tipo,prioridad)VALUES(:numero,:id_usuario,:id_proveedor,:fecha_inicio,:fecha_fin,:comentario,:centro_costo,:ot,:area,:tipo,:prioridad)";

    $statement = $conexion->prepare($query);
    $statement->bindParam(':numero',$this->numero);
    $statement->bindParam(':id_usuario',$this->id_usuario);
    $statement->bindParam(':id_proveedor',$this->id_proveedor);
    $statement->bindParam(':fecha_inicio',$this->fecha_inicio);
    $statement->bindParam(':fecha_fin',$this->fecha_fin);
    $statement->bindParam(':comentario',$this->comentario);
    $statement->bindParam(':centro_costo',$this->centro_costo);
    $statement->bindParam(':ot',$this->ot);
    $statement->bindParam(':area',$this->area);
    $statement->bindParam(':tipo',$this->tipo);
    $statement->bindParam(':prioridad',$this->prioridad);
    
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
     $query     = "DELETE FROM movalmcab WHERE id=:id";
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


public function actualizar()
{
   try {
    $modelo    = new Conexion();
    $conexion  = $modelo->get_conexion();
     $query     = "INSERT INTO movalmcab(alm,numero,doc_oc,id_usuario,id_proveedor,fecha_inicio,fecha_fin,ot,centro_costo,area,tipo)
SELECT  :alm,:numero,numero,id_usuario,id_proveedor,fecha_inicio,fecha_fin,centro_costo,ot,area,'NI'  FROM  comovc  WHERE numero=:numero AND tipo='OC'";

    $statement = $conexion->prepare($query);
    $statement->bindParam(':numero',$this->numero);
    $statement->bindParam(':id_proveedor',$this->id_proveedor);
    $statement->bindParam(':fecha_inicio',$this->fecha_inicio);
    $statement->bindParam(':fecha_fin',$this->fecha_fin);
    $statement->bindParam(':comentario',$this->comentario);
    $statement->bindParam(':centro_costo',$this->centro_costo);
    $statement->bindParam(':ot',$this->ot);
    $statement->bindParam(':area',$this->area);
    $statement->bindParam(':tipo',$this->tipo);
    $statement->bindParam(':estado',$this->estado);
    $statement->bindParam(':prioridad',$this->prioridad);
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





function lista($tipo)
{
   
	try {

	$modelo    = new Conexion();
	$conexion  = $modelo->get_conexion();
	$query     = "SELECT mc.id, mc.numero, concat(u.nombres,' ',u.apellidos) as usuaruio, p.id as idproveedor, p.contacto as proveedor, mc.fecha_inicio, mc.fecha_fin, mc.comentario, c.id as idcentro_costo, c.codigo as codigocentro_costo, c.descripcion as centro_costo,
mc.ot as orden_trabajo, a.id as idarea, a.codigo as codigo_area, a.descripcion as area, mc.tipo, mc.estado, mc.prioridad
from movalmcab as mc
left join usuario as u on mc.id_usuario = u.id
left join centro_costo as c on mc.centro_costo = c.codigo
left join area as a on mc.area = a.codigo
left join proveedor as p on mc.id_proveedor = p.id WHERE mc.tipo=:tipo";
	$statement = $conexion->prepare($query); 
  $statement->bindParam(':tipo',$tipo);
	$statement->execute();
	$result = $statement->fetchAll();
	return $result;
	} catch (Exception $e) {
	echo "ERROR: " . $e->getMessage();
	}


}





public function consulta($id,$campo,$tipo)
{
    try {
        
    $modelo    = new Conexion();
    $conexion  = $modelo->get_conexion();
    $query     = "SELECT mc.id, mc.numero, concat(u.nombres,' ',u.apellidos) as usuaruio, p.id as idproveedor, p.contacto as proveedor, mc.fecha_incio, mc.fecha_fin, mc.comentario, c.id as idcentro_costo, c.codigo as codigocentro_costo, c.descripcion as centro_costo,
mc.ot as orden_trabajo, a.id as idarea, a.codigo as codigo_area, a.descripcion as area, mc.tipo, mc.estado, mc.prioridad
from movalmcab as mc
left join usuario as u on mc.id_usuario = u.id
left join centro_costo as c on mc.centro_costo = c.codigo
left join area as a on mc.area = a.codigo
left join proveedor as p on mc.id_proveedor = p.id WHERE mc.numero=:id AND mc.tipo=:tipo";
    $statement = $conexion->prepare($query);
    $statement->bindParam(':id',$id);
    $statement->bindParam(':tipo',$tipo);
    $statement->execute();
    $result   = $statement->fetch();
    return $result[$campo];
    } catch (Exception $e) {
        echo "ERROR: " . $e->getMessage();
    }
}






}



 ?>