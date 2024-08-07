<?php
// Conectar a la base de datos
//Verificamos si la sesion ya esta abierta
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
$db = conectarDB();

// Realizar la consulta a la base de datos
$query = "SELECT * FROM posts ORDER BY created_at DESC";
$resultado = mysqli_query($db, $query);

// Mensaje condicional
$result = $_GET['resultado'] ?? null;

include('../includes/template/header.php');
?>



    <main class="container my-4">
        <?php if ($result): ?>
            <div class="alert alert-success" role="alert">
                Publicación creada exitosamente
            </div>
        <?php endif; ?>

        <div class="row">
            <?php while ($publicacion = mysqli_fetch_assoc($resultado)): ?>
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="../imagenes/<?php echo $publicacion['image']; ?>" class="card-img-top" alt="Imagen de la Publicación">
                        <div class="card-body">
                            <p class="card-text"><?php echo $publicacion['description']; ?></p>
                            <small class="text-muted"><?php echo $publicacion['created_at']; ?></small>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </main>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

   <?php
    include('../includes/template/footer.php');
    ?>