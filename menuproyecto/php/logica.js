
var contadorcompu = 0;
var contadorindu = 0;
var contadorelectro = 0;
var contadormecatro = 0;

function soloNumeros(e) {
    let key = e.keyCode || e.which;
    let numero = "0123456789";
    let tecla = String.fromCharCode(key).toLowerCase();
    if (numero.indexOf(tecla) == -1) {
        return false;
    }
    if (e.target.id == "edad") {
        return maxedad();
    }
}

function soloLetras(e) {
    let key = e.keyCode || e.which;
    let letras = " qwertyuioplkjhgfdsazxcvbnm QWERTYUIOPASDFGHJKLZXCVBNM";
    let tecla = String.fromCharCode(key).toLowerCase();
    if (letras.indexOf(tecla) == -1) {
        return false;
    }
}

function maxedad() {
    if (document.getElementById("edad").value.length >= 2) {
        return false;
    }
}





function buscarPerfil() {
    const idPerfil = document.getElementById("idPerfil").value;
    if (idPerfil) {
       
        document.getElementById("formularioPerfil").style.display = "block";
    } else {
        alert("Por favor, introduce un ID de perfil.");
    }
}

function guardarPerfil() {
   
    alert("Perfil guardado");
}

function modificarPerfil() {
   
    alert("Perfil modificado");
}

function cancelarEdicion() {
  
    window.location.href = "tabla.php"
     alert("Entrando a Registros");
}
   
   


function salirPagina() {
    alert("saliendo de la pagina");
   
    window.location.href = "../php/index1.php"
}




