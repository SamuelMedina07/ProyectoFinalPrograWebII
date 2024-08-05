function verificarUsuario(){
	 var username = $("#usernameCheck").val();
	alert(username); 

 var data = {
	   username : username
	   
	};

	 $.ajax({
        data: data,
        url: 'php/verificacion.php',
        type: 'POST',
	 
	 beforesend: function()
        {
          $('#mostrar_mensaje').html("Mensaje antes de Enviar");
        },

        success: function(mensaje)
        {
          $('#mostrar_mensaje').html(mensaje);
		  if(mensaje.trim() == "1"){
             alert("ya existe este usuario favor ubicar otro");

          }else{alert("usuario disponible");}
       }
});
} 

function verificarEmail(){
  var email = $("#emailCheck").val();
	alert(email); 

 var data = {
	   email : email
	   
	};

	 $.ajax({
        data: data,
        url: 'php/verificacion2.php',
        type: 'POST',
	 
	 beforesend: function()
        {
          $('#mostrar_mensaje').html("Mensaje antes de Enviar");
        },

        success: function(mensaje)
        {
          $('#mostrar_mensaje').html(mensaje);
		  if(mensaje.trim() == "1"){
             alert("ya existe este email favor ubicar otro");

          }else{alert("usuario disponible");}
       }
});
}
