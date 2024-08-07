<?php
session_start();
require '../includes/config/database.php';

// Verifica si el usuario está logueado
if (!isset($_SESSION['user_id'])) {
    die("No has iniciado sesión.");
}

$idUsuario = $_SESSION['user_id']; // Usa el ID del usuario desde la sesión

$db = conectarDB();

// Consulta para obtener los datos del usuario
$stmt = $db->prepare("SELECT username, email, nombreperfil, descripcion, foto FROM users WHERE id = ?");
$stmt->bind_param("i", $idUsuario);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    die("Usuario no encontrado.");
}

$user = $result->fetch_assoc();

// Procesar la actualización si se envía el formulario
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = trim($_POST['email']);
    $nombreperfil = trim($_POST['nombre']);
    $descripcion = trim($_POST['descripcion']);

    // Verifica si todos los campos requeridos están llenos
    if (empty($email) || empty($nombreperfil) || empty($descripcion)) {
        echo "Todos los campos son obligatorios.";
    } else {
        if (isset($_FILES['foto']) && $_FILES['foto']['error'] === UPLOAD_ERR_OK) {
            $foto = file_get_contents($_FILES['foto']['tmp_name']);
            $stmt = $db->prepare("UPDATE users SET email = ?, nombreperfil = ?, descripcion = ?, foto = ? WHERE id = ?");
            $stmt->bind_param("ssssi", $email, $nombreperfil, $descripcion, $foto, $idUsuario);
        } else {
            $stmt = $db->prepare("UPDATE users SET email = ?, nombreperfil = ?, descripcion = ? WHERE id = ?");
            $stmt->bind_param("sssi", $email, $nombreperfil, $descripcion, $idUsuario);
        }

        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            // Redirigir a la misma página con un parámetro de éxito
            header("Location: index.php?updated=true");
            exit;
        } else {
            echo "Error al actualizar el usuario.";
        }
    }
}

$stmt->close();
$db->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuario</title>
    <link rel="stylesheet" href="../estilos/stilos2.css">
</head>
<body>
    <div class="container"> 
      <a href="../paginaPrincipal/index.php">Regresar al inicio</a><br><br>
      <label for="usuario">Nombre de Usuario:</label>
      <label id="username"><?php echo htmlspecialchars($user['username']); ?></label>
      
      <h1>Editar Información</h1>
     
      <form method="post" enctype="multipart/form-data">
          <!-- Imagen de perfil -->
          <div class="profile-image-container">
              <img id="fotoPreview" src="<?php echo $user['foto'] ? 'data:image/jpeg;base64,' . base64_encode($user['foto']) : 'images/tr.jpg'; ?>" alt="Previsualización" class="profile-img">
          </div>
          
          <!-- Campos del formulario -->
          <div class="form-group">
              <label for="email">Email:</label>
              <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>" required>
          </div>

          <div class="form-group">
              <label for="nombre">Nombre de Perfil:</label>
              <input type="text" id="nombre" name="nombre" value="<?php echo htmlspecialchars($user['nombreperfil']); ?>" required>
          </div>

          <div class="form-group">
              <label for="descripcion">Descripción:</label>
              <textarea id="descripcion" name="descripcion" required><?php echo htmlspecialchars($user['descripcion']); ?></textarea>
          </div>

          <div class="form-group">
              <label for="foto" class="upload-btn">Cambiar Foto de Perfil</label>
              <input type="file" id="foto" name="foto" accept="image/*" onchange="previsualizarImagen(event)">
          </div>

          <input type="submit" name="guardar" value="Guardar Cambios" class="submit-btn">
      </form>
      
      <?php if (isset($_GET['updated']) && $_GET['updated'] == 'true'): ?>
          <p>Actualización exitosa.</p>
      <?php endif; ?>
    </div>

    <script>
        function previsualizarImagen(event) {
            const input = event.target;
            const preview = document.getElementById('fotoPreview');
            
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
</body>
</html>
