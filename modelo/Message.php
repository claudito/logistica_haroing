<?php 

class Message
{


function __construct()
{

}


function bienvenido($usuario)
{

return  '<script>
		swal({
		title: "Bienvenido",
		type:"success",
		text: "'.trim($usuario).'",
		timer: 3000,
		showConfirmButton: false
		});
        </script>';

}




}



 ?>