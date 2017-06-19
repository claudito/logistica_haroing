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
<img src="http://www.freeiconspng.com/uploads/user-login-icon-29.png" width="200" alt="Login" class="img-responsive" >
</center>
<br>
<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title text-center">Login</h3>
  </div>
  <div class="panel-body">

  <div  id="mensaje"></div>

  <form  method="post" autocomplete="off">

  <div class="form-group">
  <label>Correo</label>
  <input type="email"  placeholder="Correo" class="form-control" name="correo"  id="correo"  autofocus="" />
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