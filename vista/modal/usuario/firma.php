<?php 

include'../../../autoload.php';
include'../../../session.php';

$id       =  $_GET['id'];   
$carpeta  =  "usuario";
$usuario  =  new Usuario();
$firma    =  $usuario->consulta($id,'img_firma');

 ?>

<form role="form" id="firma"  enctype="multipart/form-data" method="POST" autocomplete="Off">

<input type="hidden" name="usuario" value="<?php echo $id; ?>">

<div class="input-group">
<input type="file"  name="firma"  class="form-control"  required="">
<span class="input-group-btn">
<button class="btn btn-primary" type="submit">Subir Firma</button>
</span>
</div><!-- /input-group -->

</form>

<p></p>

<img src="../docs/pdf/img/firma/<?php echo $firma; ?>" 
  class="img-responsive img-thumbnail">

<script>

$(function(){
$("#firma").on("submit", function(e){
e.preventDefault();
var f = $(this);
var formData = new FormData(document.getElementById("firma"));
formData.append("dato", "valor");

$.ajax({
url: "../controlador/<?php echo $carpeta; ?>/firma.php",
type: "post",
dataType: "html",
data: formData,
cache: false,
contentType: false,
processData: false
})
.done(function(res){
    $("#mensaje").html(res);
    $('#modal-firma').modal('hide');  // ocultar modal
    $('body').removeClass('modal-open');
    $("body").removeAttr("style");
    $('.modal-backdrop').remove();
    loadTabla(1);
});
});
});

</script>


