<?php 


class Conexion
{


public function get_conexion()
{

try {
	
$conexion = new PDO("mysql:host=".SERVER.";dbname=".BD."",USER,PASS,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

return $conexion;
} 
catch (Exception $e) 
{
	echo "ERROR: " . $e->getMessage();

}



}




}







 ?>