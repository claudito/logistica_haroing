<?php 
$assets = new Assets();
$html   = new Html();
$assets ->principal('Iniciar Sesión');
$assets ->sweetalert();
?>
<script src="ajax/login.js"></script>
<?php $html->header(); ?>

<div class="row">
<div class="col-md-4"></div>
<div class="col-md-4">
<br><br>
<center>
<img src="<?php echo PATH ?>assets/img/logo.jpg"  alt="login" class="img-responsive" 
>
</center>
<br>
<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title text-center">Gestión Logística</h3>
  </div>
  <div class="panel-body">

  <div  id="mensaje"></div>

  <form  method="post" autocomplete="off">

  <div class="form-group">
  <label>Usuario</label>
  <select name="correo" id="correo" class="form-control" required="">
  <option value="">[Seleccionar]</option>
  <?php 
  $usuario  =  new Usuario();
  foreach ($usuario->lista() as $key => $value): ?>
  <option value="<?php echo $value['correo']; ?>"><?php echo $value['nombres'].' '.$value['apellidos']; ?></option>
  <?php endforeach ?>
  </select>
  </div>

  <div class="form-group">
  <label>Contraseña</label>
  <input type="password" maxlength="100"  placeholder="Contraseña"  class="form-control" id="pass"  />
  </div>

  <input type="hidden" id="path" value="<?php echo PATH; ?>">

  <input type="submit" id="login" class="btn btn-primary"  value="Iniciar Sesión">

  </form>

  </div>
</div>
</div>

</div>



<?php $html -> footer(); ?>