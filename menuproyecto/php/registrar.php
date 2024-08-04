<?php
include("conexion.php");

//importar la conexion
$base =conectarDB();

if (isset($_POST['registro'])) {
    if (
        strlen($_POST['nombre']) >= 1  &&
        strlen($_POST['apellido']) >= 1  &&
        strlen($_POST['descripcion']) >= 1  &&
        strlen($_POST['fecha']) >= 1 &&
        strlen($_POST['foto']) >= 1

    ) {

        $Nombre = trim($_POST['nombre']);
        $Apellido = trim($_POST['apellido']);
        $Descripcion = trim($_POST['descripcion']);
        $Fecha = trim($_POST['fecha']);
        $Foto = trim($_POST['foto']);


        $consulta = "INSERT INTO  perfil(nombre, apellido, descripcion,fecha,foto)
        VALUES('$Nombre', '$Apellido', '$Descripcion', '$Fecha', '$Foto')";

        $resultado = mysqli_query($base, $consulta);
        if ($resultado) {
?>
            <h3 class="correctamente">Registrado Correctamente</h3>
        <?php
        }
    } else {
        ?>
        <h3 class="Error">Registro No Registrado</h3>
<?php

    }
}



?>