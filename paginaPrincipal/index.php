<?php
// Conectar a la base de datos
require '../includes/config/database.php';
$db = conectarDB();

// Realizar la consulta a la base de datos
$query = "SELECT * FROM posts ORDER BY created_at DESC";
$resultado = mysqli_query($db, $query);

// Mensaje condicional
$result = $_GET['resultado'] ?? null;
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Principal</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/estiloIndex.css">
</head>
<body>
    <header class="bg-primary text-white p-3">
        <div class="container d-flex justify-content-between align-items-center">
            <div class="d-flex align-items-center">
                <img src="img/icon.png" alt="Icono" class="icon" height="40px">
                <h1 class="h3 ml-2">Página Principal</h1>
            </div>
            <div>
                <a href="../admin/index.php" class="btn btn-primary"><img src="Img/config.png" alt="configuracion" height="40px"></a>
                <a href="../admin/blog/crear.php" class="btn btn-success">Crear Publicación</a>
                <a href="" class="btn btn-danger">Cerrar Sesión</a>
            </div>
        </div>
    </header>

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

    <footer>
        <div class="container">
            <div class="row">
                <div class="col">
                    <h3>Enlaces</h3>
                    <ul>
                        <li><a href="#">Inicio</a></li>
                        <li><a href="#">Sobre Nosotros</a></li>
                        <li><a href="#">Servicios</a></li>
                        <li><a href="#">Contacto</a></li>
                    </ul>
                </div>
                <div class="col">
                    <h3>Contacto</h3>
                    <p>Dirección: Blov Armenta San Pedro Sul, Cortes</p>
                    <p>Teléfono: (504) 2508-2600</p>
                    <p>Email: fadsfag@gmail.com</p>
                </div>
                <div class="col">
                    <h3>Usuarios</h3>
                    <p>Fredys Zavala</p>
                    <p>Dailan Reyes</p> 
                    <p>Norman Bu</p>
                    <p>Jose Hernandez</p>
                    <p>Fernando Murillo</p>
                    
                    
            </div>
        </div>
    </footer>
   
</body>


</html>