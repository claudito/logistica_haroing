<?php 


class Funciones
{


function __construct()
{

}


function validar_xss($cadena)
{
	$cadena = htmlspecialchars(trim($cadena), ENT_QUOTES,'UTF-8');
	return $cadena;
}



}


 ?>