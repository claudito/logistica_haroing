<?php 

include'../../../autoload.php';
include'../../../session.php';

$numero  =  $_POST['elegido'];
$tipo    =  "OC";

$comovc  = new Comovc();
$comovd  =  new Comovd();

 ?>

<?php if (count($comovd->lista($numero,$tipo))>0): ?>



<input type="hidden" name="num_oc" id="" value="<?php echo $numero; ?>">

<div class="panel panel-default">
<div class="table-responsive">
	<table class="table table-condensed">
		<thead>
			<tr class="success">
				<th class="text-center">ORDEN DE COMPRA</th>
				<th class="text-center">REQUERIMIENTO</th>
				<th>PROVEEDOR</th>
				<th>USUARIO</th>
				<th>ÁREA</th>
				<th>TRANSACCIÓN</th>
				<th>TIPO DOC</th>
				<th>NUM DOC</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td class="text-center">
				<?php echo str_pad($comovc->consulta($numero,'numero',$tipo),10,'0',STR_PAD_LEFT); ?>
				</td>
				<td class="text-center">
				<?php echo str_pad($comovc->consulta($numero,'requerimiento',$tipo),10,'0',STR_PAD_LEFT); ?>
				</td>
				<td><?php echo $comovc->consulta($numero,'ruc',$tipo).' - '.$comovc->consulta($numero,'razon_social',$tipo); ?></td>
			    <td><?php echo $comovc->consulta($numero,'usuario',$tipo); ?></td>
			    <td><?php echo $comovc->consulta($numero,'area',$tipo); ?></td>
			    <td>CL - COMPRA LOCAL</td>
			    <td>
			    <select name="doc_ref" id="" class="input-sm" required="">
			    <option value="">[Seleccionar]</option>
			    <?php 
                $documento_tipo =  new Documento_tipo();
			    foreach ($documento_tipo->lista() as $key => $value): ?>
			    <option value="<?php echo $value['codigo'] ?>"><?php echo $value['codigo'] ?></option>
			    <?php endforeach ?>
			    </select>
			    </td>
			    <td>
			    <input type="number" min="0"  name="num_ref" class="input-sm" required="">
			    </td>
			</tr>
		</tbody>
	</table>
</div>
</div>


 <div class="panel panel-default">
 <div class="table-responsive">
 	<table class="table table-condensed">
 		<thead>
 			<tr class="info">
 				<th class="text-center">IT</th>
 				<th>CÓDIGO</th>
 				<th>DESCRIPCIÓN</th>
 				<th class="text-center">UND</th>
 				<th class="text-center">CENTRO DE COSTO</th>
 				<th class="text-center">OT</th>
 				<th class="text-center">CANT</th>
 				<th class="text-center">SALDO</th>
 			</tr>
 		</thead>
 		<tbody>
 		<?php foreach ($comovd->lista($numero,$tipo) as $key => $value): ?>
		<?php if ($value['saldo']>0): ?>
		<tr>
		<td class="text-center"><?php echo $value['item']; ?></td>
		<td><?php echo $value['codigo']; ?></td>
		<td><?php echo $value['descripcion']; ?></td>
		<td class="text-center"><?php echo $value['unidad']; ?></td>
		<td class="text-center"><?php echo $value['centro_costo']; ?></td>
		<td class="text-center"><?php echo $value['ot']; ?></td>
		<td class="text-center"><?php echo round($value['saldo'],2); ?></td>
		<td class="text-center">
	    <input type="hidden" name="item[]" value="<?php echo $value['item']; ?>">
		<input type="number" step="any"  min="0.01"  name="saldo[]" max="<?php echo round($value['cantidad'],2); ?>"  class="input-sm text-center" value="<?php echo round($value['saldo'],2); ?>"  required>
		</td>
		</tr>	
		<?php endif ?>
 		<?php endforeach ?>
 		</tbody>
 	</table>
 </div>
 </div>

 
 <button class="btn btn-primary" type="submit"><i class="fa fa-plus"></i>  Crear Nota de Ingreso</button>


 <?php else: ?>
 <p class="alert alert-warning">No hay Información Disponible.</p>
 <?php endif ?>


