
$(buscar());

function buscar(consulta){
 	
  $.ajax({

  	url:'../procesos/buscar.php',
  	type:'POST',
  	dataType: 'php',
  	data: {consulta:'consulta'},
  })
  .done(function(respuesta) {
	  $("#datos").php(respuesta);
	  
 
  })
	.fail(function(){
		console.log("error");

	})

}

$(document).on('keyup', '#caja_busqueda', function(){
	var valor =  $(this).val();
	if(valor != ""){
		buscar(valor);
	}else{
		buscar();
	}
});