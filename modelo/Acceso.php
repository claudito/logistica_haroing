<?php 

class Acceso
{


protected $user;
protected $pass;


function __construct($user='',$pass='')
{
	$this->user = $user;
	$this->pass = $pass;
}


public function login()
{
   try {
    $modelo    = new Conexion();
    $conexion  = $modelo->get_conexion();
    $query     = "SELECT * FROM login WHERE correo=:correo AND pass=:pass";
    $statement = $conexion->prepare($query);
    $statement->bindParam(':correo',$this->user);
    $statement->bindParam(':pass',$this->pass);
    $statement->execute();
    $result   = $statement->fetchall();
    
    if (count($result) >0)
    {
    
     session_start();
     $statement->execute();
     $dato   = $statement->fetch();
     $_SESSION[KEY.ID]     = $dato['id'];
     $_SESSION[KEY.CORREO] = $dato['correo'];
     return "true";
    } 
    else 
    {
      return "false";
    }
       
   }
    catch (Exception $e) 
   {
      return  "ERROR: " . $e->getMessage();
   
   }
}




function  logout()
{

  try {

  if (!isset($_SESSION[KEY.ID])) 
  {
     header('Location: '.PATH.'');
  }
  else
  { 

     unset($_SESSION[KEY.ID]);
     unset($_SESSION[KEY.CORREO]);
     header('Location: '.PATH.'');
  }
 
  } catch (Exception $e) {

    echo   "ERROR: " . $e->getMessage();
    
  }
   
}




}




 ?>