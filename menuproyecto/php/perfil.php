<!DOCTYPE html>
<html lang="en">
<!-- Declaración del tipo de documento HTML y el idioma de la página -->

<head>
    <meta charset="UTF-8">
    <!-- Define el conjunto de caracteres de la página como UTF-8 -->

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Configura la ventana gráfica para que la página se vea bien en todos los dispositivos -->

    <title>Perfil</title>
    <!-- Título de la página que se muestra en la pestaña del navegador -->

    <link rel="stylesheet" href="stilos.css">
    <!-- Enlace a la hoja de estilos CSS externa llamada "stilos.css" -->

    <script src="logica.js"></script>
    <!-- Enlace al archivo JavaScript externo llamado "logica.js" -->


    <!-- Cargar la biblioteca de Google Charts -->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>


    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/autonumeric/4.10.5/autoNumeric.min.js" integrity="sha512-EGJ6YGRXzV3b1ouNsqiw4bI8wxwd+/ZBN+cjxbm6q1vh3i3H19AJtHVaICXry109EVn4pLBGAwaVJLQhcazS2w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


</head>

<body>
    <div class="form-container">
        <h3>Ingresar Perfil</h3>

        <form method="post" id="formularioPerfil">
        <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" required>

            <label for="apellido">Apellido:</label>
            <input type="text" id="apellido" name="apellido" required>

            <label for="fecha">Fecha de Registro:</label>
            <input type="date" id="fecha" name="fecha" required>


            <label for="descripcion">Descripción:</label>
            <textarea id="descripcion" name="descripcion" rows="4" required></textarea>



            <label for="foto">Foto:</label>
            <input type="file" id="foto" name="foto">
            

            <div class="button-container">
                <input class="imput"  name="registro" type="submit" value="Ingresar"></input>
                <button class="boton" type="button" onclick="cancelarEdicion()">Ver Registro</button>
                <button class="botonre" type="button" onclick="salirPagina()">Regresar</button>
            </div>
        </form>
    </div>



    <?php 
    include("registrar.php");
    ?>
    
</body>

</html>