
function actualiza_contenido()
{
$('#correlativo').load('../ajax/realtime/php/ni-correlativo.php');
}

setInterval('actualiza_contenido()', 1000 );
