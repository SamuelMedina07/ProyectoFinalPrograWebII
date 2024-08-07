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
    <link rel="stylesheet" href="../estilos/estiloIndex.css">
    <link rel="stylesheet" href="../estilos/styleadmin.css">
</head>
<body>
    <header class="bg-primary text-white p-3">
        <div class="container d-flex justify-content-between align-items-center">
            <div class="d-flex align-items-center">
                <a href="../paginaPrincipal/index.php"><img src="../img/icon.png" alt="Icono" class="icon" height="40px"></a>
                <h1 class="h3 ml-2">Página Principal</h1>
            </div>
            <div>
                <a href="../admin/index.php" class="btn btn-primary"><img src="../img/config.png" alt="configuracion" height="40px"></a>
                <a href="../admin/blog/crear.php" class="btn btn-success">Crear Publicación</a>
                <a href="../cerrarsesion.php" class="btn btn-danger" >Cerrar Sesión</a>
            </div>
        </div>
    </header>
