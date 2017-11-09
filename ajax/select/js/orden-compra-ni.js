
$(document).ready(function() {
// Parametros para el combo
$("#id_oc").change(function () {
$("#id_oc option:selected").each(function () {
elegido=$(this).val();
$.post("../ajax/select/file/orden-compra-ni.php", { elegido: elegido }, function(data){
$("#detalle").html(data);
});     
});
});    
});
