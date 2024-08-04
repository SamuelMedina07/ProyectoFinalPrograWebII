<?php
include("conexion.php");
$base = conectarDB();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Perfil</title>
    <link rel="stylesheet" href="tabla.css">
    <script src="tabla.js"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/autonumeric/4.10.5/autoNumeric.min.js" integrity="sha512-EGJ6YGRXzV3b1ouNsqiw4bI8wxwd+/ZBN+cjxbm6q1vh3i3H19AJtHVaICXry109EVn4pLBGAwaVJLQhcazS2w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>
<body>
    <header>
        <h1>Editar Perfil</h1>
    </header>
    <div class="container">
        <?php
        if (isset($_POST['actualizar'])) {
            $id = $_POST['idperfil'];
            $Nombre = $_POST['nombre'];
            $Apellido = $_POST['apellido'];
            $Descripcion = $_POST['descripcion'];
            $Fecha = $_POST['fecha'];
            $Foto = $_POST['foto'];

            $sql = "UPDATE perfil SET 
                nombre='" . mysqli_real_escape_string($base, $Nombre) . "',
                apellido='" . mysqli_real_escape_string($base, $Apellido) . "',
                descripcion='" . mysqli_real_escape_string($base, $Descripcion) . "',
                fecha='" . mysqli_real_escape_string($base, $Fecha) . "',
                foto='" . mysqli_real_escape_string($base, $Foto) . "'
                WHERE idperfil='" . mysqli_real_escape_string($base, $id) . "'";

            $result = mysqli_query($base, $sql);

            if ($result) {
                echo "<p>Perfil actualizado correctamente.</p>";
            } else {
                echo "<p>Error al actualizar el perfil: " . mysqli_error($base) . "</p>";
            }
        } 
        else {
            if (isset($_GET['idperfil'])) {
                $id = $_GET['idperfil'];
                $sql = "SELECT * FROM perfil WHERE idperfil='" . mysqli_real_escape_string($base, $id) . "'";
                $result = mysqli_query($base, $sql);

                if ($result && mysqli_num_rows($result) > 0) {
                    $fila = mysqli_fetch_assoc($result);
                    $Nombre = $fila["nombre"];
                    $Apellido = $fila["apellido"];
                    $Descripcion = $fila["descripcion"];
                    $Fecha = $fila["fecha"];
                    $Foto = $fila["foto"];
                } else {
                    echo "<p>No se encontró el perfil.</p>";
                }
            } else {
              
            }
        }
        ?>

        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post" onsubmit="return validateForm()">
            <label for="nombre">NOMBRE</label>
            <input type="text" id="nombre" name="nombre" value="<?php echo isset($Nombre) ? $Nombre : ''; ?>">

            <label for="apellido">APELLIDO</label>
            <input type="text" id="apellido" name="apellido" value="<?php echo isset($Apellido) ? $Apellido : ''; ?>">

            <label for="descripcion">DESCRIPCION</label>
            <input type="text" id="descripcion" name="descripcion" value="<?php echo isset($Descripcion) ? $Descripcion : ''; ?>">

            <label for="fecha">FECHA</label>
            <input type="text" id="fecha" name="fecha" value="<?php echo isset($Fecha) ? $Fecha : ''; ?>">

            <label for="foto">FOTO</label>
            <input type="text" id="foto" name="foto" value="<?php echo isset($Foto) ? $Foto : ''; ?>">
            

            <input type="hidden" name="idperfil" value="<?php echo isset($id) ? $id : ''; ?>">

            <input type="submit" name="actualizar" value="Actualizar"> 
            <button><a href="tabla.php">Regresar</a></button>
        </form>
        
       
    </div>
</body>

</html>