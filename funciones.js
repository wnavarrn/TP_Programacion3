

var servidor="http://localhost/Estacionamiento/apirest/";

function ingresar()
{
	$.ajax({
		 type: "get",
		url: servidor+"empleado/",
	})
	.then(function(retorno){

		console.info("bien", retorno);	
		var parsedJSON = retorno;	
		console.log(parsedJSON);

	
	},function(error){
		console.info("error",error);
	});
}
