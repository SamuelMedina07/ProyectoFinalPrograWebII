<?php
<<<<<<< HEAD

session_start();
//var_dump($_SESSION);

/* if (isset($_SESSION)){
    session_start();
} */
$autenticado = $_SESSION["login"] ?? false;

if (!$autenticado){
    header('location: ../index.php');
}
require '../includes/config/database.php';
=======
require '/includes/config/database.php';
>>>>>>> 663630bd2f03c2bfe9d94b69186a879e0ca68fa8

//importar la conexion
$db = conectarDB();

//realizamos la consulta a la base
$query = " SELECT * FROM posts";

$resultado = mysqli_query($db, $query);

//Muestra mensaje condicional
$result = $_GET['resultado'] ?? null; //busca el get si no existe le agrega un null

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);

    if ($id) {

        //Eliminar la imagen de la propiedad
        $consulta = "SELECT image FROM posts WHERE id = $id";
        $resultado = mysqli_query($db, $consulta);
        $publicacion = mysqli_fetch_assoc($resultado);
        unlink('../imagenes/' . $publicacion['image']);

        //Eliminar la propiedad
        $query = "DELETE FROM posts WHERE id = $id";
        $resultado = mysqli_query($db, $query);
        if ($resultado) {
            header('Location: index.php?resultado=3');
        }
    }
}

// echo "<pre>";
// var_dump($resultado);
// echo "</pre>";
// exit;
include('../includes/template/header.php');
?>


<body>
    <h1>Administrar tus publicaciones</h1>

    
    
    <div class="contenedor">
    <?php if (intval($result) === 1) : ?>
        <p class="alerta exito">Anuncio Creado Correctamente</p>
    <?php elseif (intval($result) === 2) : ?>
        <p class="alerta exito">Anuncio Actualizado Correctamente</p>
    <?php elseif (intval($result) === 3) : ?>
        <p class="alerta exito">Registro Eliminado Correctamente</p>
    <?php endif; ?>
    <a class="boton-nuevo" href="../admin/blog/crear.php">+ Nueva publicacion</a>
        <table class="tabla1">
            <thead>
                <tr class="encabezado">
                    <th>Id</th>
                    <th>Descripción</th>
                    <th>Imagen</th>
                    <th>Creado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <?php while ($publicacion = mysqli_fetch_assoc($resultado)) : ?>
                <tbody>
                    <tr>
                        <td><?php echo $publicacion["id"] ?></td>
                        <td><?php echo $publicacion["description"] ?></td>
                        <td>
                            <img src="../imagenes/<?php echo $publicacion["image"] ?>" alt="imagen1">
                        </td>
                        <td><?php echo $publicacion["created_at"] ?></td>
                        <td> 
                            <form method="POST" class="w-100">
                            <input type="hidden" name="id" value="<?php echo $publicacion['id']; ?>">
                            <button class="boton-eliminar" type="submit" value="Eliminar">✕ Eliminar</button>
                            </form> 
                            <a class="boton-actualizar" href="../admin/blog/actualizar.php?id=<?php echo $publicacion["id"]; ?>">↻ Actualizar</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
                </tbody>
        </table>
    </div>
    
    <?php
    include('../includes/template/footer.php');
    ?>