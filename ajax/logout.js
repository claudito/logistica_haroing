var path  = "http://192.168.1.15/dev/haroing/";


function logout(){

	$.ajax({
		url:path+'controlador/logout.php',
		type:'POST',
		async:true,
		data:{accion:'logout'},
		success:function()
		{
			self.location=path;
		},
		error:function(xhr,status,error)
		{
			alert('ERROR: '+error);
		}


	});
}