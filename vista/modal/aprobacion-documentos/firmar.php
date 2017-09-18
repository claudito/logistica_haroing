<?php 

include'../../../autoload.php';
include'../../../session.php';

$usuario =  $_SESSION[KEY.ID];
$numero  =  $_GET['numero'];
$tipo    =  $_GET['tipo'];
$carpeta =  "aprobacion-documentos";

$usuario_tipo           =  new Usuario_tipo();
$solicitante            =  $usuario_tipo->consulta($usuario,'solicitante');
$compras                =  $usuario_tipo->consulta($usuario,'compras');
$jefe_area              =  $usuario_tipo->consulta($usuario,'jefe_area');
$gerente                =  $usuario_tipo->consulta($usuario,'gerente');

$aprobacion_documentos  =  new Aprobacion_documentos();
$firma_1                =  $aprobacion_documentos->consulta($tipo,$numero,'firma_1');
$firma_2                =  $aprobacion_documentos->consulta($tipo,$numero,'firma_2');
$firma_3                =  $aprobacion_documentos->consulta($tipo,$numero,'firma_3');
$usuario_firma_1        =  $aprobacion_documentos->consulta($tipo,$numero,'usuario_firma_1');
$usuario_firma_2        =  $aprobacion_documentos->consulta($tipo,$numero,'usuario_firma_2');
$usuario_firma_3        =  $aprobacion_documentos->consulta($tipo,$numero,'usuario_firma_3');

 ?>

<form id="firmar">

<input type="hidden" name="numero" id="" value="<?php echo $numero; ?>">
<input type="hidden" name="tipo" id="" value="<?php echo $tipo; ?>">

<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
<h4 class="modal-title">Firmar Documento <i class="glyphicon glyphicon-pencil"></i></h4>
</div>
<div class="modal-body">

  <table class="table table-hover" >
    <thead>
      <tr>
      <th class="text-center"><?php echo  ($tipo=='RQ' || $tipo=='RS') ? "SOLICITANTE" : "GERENTE #1" ; ?></th>
      <th class="text-center"><?php echo  ($tipo=='RQ' || $tipo=='RS') ? "JEFE DE ÁREA" : "GERENTE #2" ; ?></th>
      <th class="text-center">ENCARGADO DE COMPRAS</th>
      </tr>
    </thead>
    <tbody>
      <tr>
      <!-- Requerimiento de Compras -->
      <?php if ($tipo=='RQ' || $tipo=='RS'): ?>
      <td class="text-center">
      <?php if ($solicitante==1): ?>
      <?php if ($firma_1==1): ?>
      <input type="hidden" name="usuario_firma_1" value="<?php echo ($usuario_firma_1==$_SESSION[KEY.ID]) ? $_SESSION[KEY.ID] : $usuario_firma_1 ; ?>">
      <input type="checkbox" name="firma_1" id="" class="form-control" checked="">
      <?php else: ?>
      <input type="hidden" name="usuario_firma_1" id="" value="<?php echo $_SESSION[KEY.ID];  ?>">
      <input type="checkbox" name="firma_1" id="" class="form-control"> 
      <?php endif ?>
      <?php else: ?>
      <input type="checkbox" name="firma_1" id="" class="form-control" disabled=""
      <?php echo ($firma_1==1) ? "checked" : "" ; ?> >
      <?php endif ?>
      </td>
      <td class="text-center">
      <?php if ($jefe_area==1): ?>
      <?php if ($firma_2==1): ?>
      <input type="hidden" name="usuario_firma_2" value="<?php echo ($usuario_firma_2==$_SESSION[KEY.ID]) ? $_SESSION[KEY.ID] : $usuario_firma_2 ; ?>">
      <input type="checkbox" name="firma_2" id="" class="form-control" checked="">
      <?php else: ?>
      <input type="hidden" name="usuario_firma_2" id="" value="<?php echo $_SESSION[KEY.ID];  ?>">
      <input type="checkbox" name="firma_2" id="" class="form-control"> 
      <?php endif ?>
      <?php else: ?>
      <input type="checkbox" name="firma_2" id="" class="form-control" disabled=""
      <?php echo ($firma_2==1) ? "checked" : "" ; ?> >
      <?php endif ?>
      </td>
      <td class="text-center">
      <?php if ($compras==1): ?>
      <?php if ($firma_3==1): ?>
      <input type="hidden" name="usuario_firma_3" value="<?php echo ($usuario_firma_3==$_SESSION[KEY.ID]) ? $_SESSION[KEY.ID] : $usuario_firma_3 ; ?>">
      <input type="checkbox" name="firma_3" id="" class="form-control" checked="">
      <?php else: ?>
      <input type="hidden" name="usuario_firma_3" id="" value="<?php echo $_SESSION[KEY.ID];  ?>">
      <input type="checkbox" name="firma_3" id="" class="form-control"> 
      <?php endif ?>
      <?php else: ?>
      <input type="checkbox" name="firma_3" id="" class="form-control" disabled=""
      <?php echo ($firma_3==1) ? "checked" : "" ; ?> >
      <?php endif ?>
      </td>
      <?php else: ?>
      <!-- Ordenes de Compras -->
      <td class="text-center">
      <?php if ($gerente==1): ?>
      <?php if ($firma_1==1): ?>
      <input type="hidden" name="usuario_firma_1" value="<?php echo ($usuario_firma_1==$_SESSION[KEY.ID]) ? $_SESSION[KEY.ID] : $usuario_firma_1 ; ?>">
      <input type="checkbox" name="firma_1" id="" class="form-control" checked="">
      <?php else: ?>
      <input type="hidden" name="usuario_firma_1" id="" value="<?php echo $_SESSION[KEY.ID];  ?>">
      <input type="checkbox" name="firma_1" id="" class="form-control"> 
      <?php endif ?>
      <?php else: ?>
      <input type="checkbox" name="firma_1" id="" class="form-control" disabled=""
      <?php echo ($firma_1==1) ? "checked" : "" ; ?> >
      <?php endif ?>
      </td>
      <td class="text-center">
      <?php if ($gerente==1): ?>
      <?php if ($firma_2==1): ?>
      <input type="hidden" name="usuario_firma_2" value="<?php echo ($usuario_firma_2==$_SESSION[KEY.ID]) ? $_SESSION[KEY.ID] : $usuario_firma_2 ; ?>">
      <input type="checkbox" name="firma_2" id="" class="form-control" checked="">
      <?php else: ?>
      <input type="hidden" name="usuario_firma_2" id="" value="<?php echo $_SESSION[KEY.ID];  ?>">
      <input type="checkbox" name="firma_2" id="" class="form-control"> 
      <?php endif ?>
      <?php else: ?>
      <input type="checkbox" name="firma_2" id="" class="form-control" disabled="" 
      <?php echo ($firma_2==1) ? "checked" : "" ; ?>  >
      <?php endif ?>
      </td>
      <td class="text-center">
      <?php if ($compras==1): ?>
      <?php if ($firma_3==1): ?>
      <input type="hidden" name="usuario_firma_3" value="<?php echo ($usuario_firma_3==$_SESSION[KEY.ID]) ? $_SESSION[KEY.ID] : $usuario_firma_3 ; ?>">
      <input type="checkbox" name="firma_3" id="" class="form-control" checked="">
      <?php else: ?>
      <input type="hidden" name="usuario_firma_3" id="" value="<?php echo $_SESSION[KEY.ID];  ?>">
      <input type="checkbox" name="firma_3" id="" class="form-control"> 
      <?php endif ?>
      <?php else: ?>
      <input type="checkbox" name="firma_3" id="" class="form-control" disabled=""
      <?php echo ($firma_3==1) ? "checked" : "" ; ?> >
      <?php endif ?>
      </td>
      <?php endif ?>
      </tr>
    </tbody>
  </table>

</div>
<div class="modal-footer">
<button type="submit" class="btn btn-default">Firmar <i class="glyphicon glyphicon-pencil"></i></button>
</div>

</form>

<script>
    $("#firmar").submit(function(e){
    e.preventDefault();
    var parametros = $(this).serialize();
     $.ajax({
          type: "POST",
          url: "../controlador/<?php echo $carpeta; ?>/firmar.php",
          data: parametros,
           beforeSend: function(objeto){
            $("#mensaje").html("Mensaje: Cargando...");
            },
          success: function(datos){
          $("#mensaje").html(datos);
         //$("#actualizar")[0].reset();  //resetear inputs
          //$('#modal-firmar').modal('hide'); //ocultar modal
          //$('body').removeClass('modal-open');
          //$("body").removeAttr("style");
          $('.modal-backdrop').remove();
          loadTabla(1);
          }
      });
  });
</script>