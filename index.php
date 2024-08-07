<?php
// var_dump($_SESSION); imprime lo que tiene la variable en arreglo
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<!--Esto lo comente yo fredys-->
	<!--preuba de comentario-->
	<!--comentdo por fer-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="estilos/estiloIndexLog.css">
	<script src="javascripts/jsIndex.js" defer></script>
</head>
<body>

<!-- 	<div class="cookiesContent" id="cookiesPopup">
		<button class="close">✖</button>
		<img src="https://cdn-icons-png.flaticon.com/512/1047/1047711.png" alt="cookies-img" />
		<p>We use cookies for improving user experience, analytics and marketing.</p>
		<button class="accept">That's fine!</button>
	  </div> -->
    <h2>Proyecto Final Grupo #2 Programacion Web II</h2>
<div class="container" id="container">
	<div class="form-container sign-up-container">
		<form method="POST" action="php/registrar.php">
			<h1>Crea una nueva cuenta</h1>
			<input type="email" placeholder="Correo Electronico" name="email" id="emailCheck" onchange="verificarEmail();" required/>
			<input type="text" placeholder="Usuario" name="username" id="usernameCheck" onchange="verificarUsuario();" required/>
			<input type="password" placeholder="Contraseña" name="password" required/>

			<input type="text" id="nombre" name="nombre" value="campo por defecto"  style="display: none;"  />
			<textarea id="descripcion" name="descripcion" rows="4" style="display: none;">campo por defecto</textarea>
                <input type="file" name="foto" id="foto" style="display: none;" />


			<button type="submit" name="accion" value="Signup" id="Signup">Sign Up</button>
		</form>
	</div>
	

	<div class="form-container sign-in-container">
		<form method="POST" action="php/ingresar.php">
			<h1>Iniciar Sesion</h1>
			 <input type="email" placeholder="Correo Electronico" name="email" /> 
			<!-- <input type="text" placeholder="Usuario" name="username"/> -->
			<input type="password" placeholder="Contraseña" name="password"/>
			<!-- <a href="#">Olvidó su contraseña</a> -->
			<button type="submit" name="accion" value="Signin">Ingresar</button>
		</form>
	</div>
	<div class="overlay-container">
		<div class="overlay">
			<div class="overlay-panel overlay-left">
				<h1>¡Bienvenido de Vuelta!</h1>
				<p>Si ya tienes una cuenta con nosotros solo dale al boton e inicia sesion </p>
				<button class="ghost" id="signIn">Iniciar Sesion</button>
			</div>
			<div class="overlay-panel overlay-right">
				<h1>Hola Extraño</h1>
				<p>Si quieres formar parte de nuestra familia crea una cuenta y empieza a crear paginas web</p>
				<button class="ghost" id="signUp">Crear Cuenta</button>
			</div>
		</div>
	</div>
</div>


	
<div id="mostrar_mensaje"></div>
<script src="javascripts/consultaRapidaIndex.js"></script>
<!-- <script src="jquery-3.4.1.min.js" defer></script> -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js" defer></script>
</body>
</html>