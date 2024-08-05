$(document.ready(function(){
  const usuario = $("#usernameCheck");
  const email = $("emailCheck");
  const formulario = $(".sign-up-container");
  formulario.on("submit",function(Evento){
    const datos = {usuario,email};
    if(usuario = "")
    {
      MostarAlerta("Usuario Obligatorio");
    }
  })

}))

function verificarUsuario(){
	 var username = $("#usernameCheck").val();

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
             $('#mostrar_mensaje').html("Ya existe este usuario favor ubicar otro");
          }else{$('#mostrar_mensaje').html("")}
       }
});
} 

function verificarEmail(){
  var email = $("#emailCheck").val();

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
        const msj="Ya existe este email favor ubicar otro";
             /* $('#mostrar_mensaje').html("Ya existe este email favor ubicar otro"); */
             MostarAlerta(msj,true)
          }else{$('#mostrar_mensaje').html("")
          }
       }
});
}

function MostarAlerta(mensaje,error = null){
const alerta = $('<p>').text(mensaje);
if(error){
  alerta.addClass('error');
}
else{
  alerta.addClass('envio');
}

$("#index.html").append(alerta);
setTimeout(()=>{
  alerta.remove();
},3000);

}
