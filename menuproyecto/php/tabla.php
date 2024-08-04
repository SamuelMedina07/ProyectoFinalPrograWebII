<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Perfil</title>


    <link rel="stylesheet" href="tabla.css">

    <script src="tabla.js"></script>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/autonumeric/4.10.5/autoNumeric.min.js" integrity="sha512-EGJ6YGRXzV3b1ouNsqiw4bI8wxwd+/ZBN+cjxbm6q1vh3i3H19AJtHVaICXry109EVn4pLBGAwaVJLQhcazS2w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


</head>

<body>





    <?php

    include("conexion.php");
    $base = conectarDB();

    // Verificar si la conexión fue exitosa
    if (!$base) {
        die("Error en la conexión: " . mysqli_connect_error());
    }

    $sql = "SELECT * FROM perfil";
    $resultado = mysqli_query($base, $sql);

    // Verificar si la consulta fue exitosa
    if (!$resultado) {
        die("Error en la consulta: " . mysqli_error($base));
    }
    ?>

    <h3>lista perfiles</h3>

    <form method="post" id="formularioPerfil">
        <Button><a href="perfil.php">Regresar</a> </Button>
        <p></p>

        <table>


            <head>
                <tr>
                    <th>NO. Perfil</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Descripcion</th>
                    <th>Fecha ingreso</th>
                    <th>Foto</th>
                    <th>Aciones</th>

                </tr>
            </head>
            <tbody id="conten">
                <?php
                while ($fila = mysqli_fetch_array($resultado)) {
                ?>
                    <tr>
                        <td><?php echo $fila['idperfil'] ?></td>
                        <td><?php echo $fila['nombre'] ?></td>
                        <td><?php echo $fila['apellido'] ?></td>
                        <td><?php echo $fila['descripcion'] ?></td>
                        <td><?php echo $fila['fecha'] ?></td>
                        <td><?php echo $fila['foto'] ?></td>
                        <td>

                            <?php echo "<a href='editar.php?idperfil=" . $fila['idperfil'] . "'>Editar</a>"; ?>
                            -
                            <?php echo "<a href='eliminar.php?idperfil=" . $fila['idperfil'] . "'>Eliminar</a>"; ?>
                        </td>
                    </tr>

                <?php
                }
                ?>
            </tbody>

        </table>

        <?php
        mysqli_close($base);
        ?>

</body>


</html>