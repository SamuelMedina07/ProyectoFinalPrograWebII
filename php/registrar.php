<?php
require '../includes/config/database.php';


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $descripcion = isset($_POST['descripcion']) ? trim($_POST['descripcion']) : 'campo por defecto';
    $nombreperfil = isset($_POST['nombre']) ? trim($_POST['nombre']) : 'campo por defecto';



    $db = conectarDB();

 
 $stmt = $db->prepare("INSERT INTO users (username, email, password, descripcion, nombreperfil, foto) VALUES (?, ?, ?, ?, ?, ?)");
 if (isset($_FILES['foto']) && $_FILES['foto']['error'] === UPLOAD_ERR_OK) {
  
  $foto = file_get_contents($_FILES['foto']['tmp_name']);
} else {
  
  $foto = file_get_contents('php\images\tr.jpg'); 
}
$stmt->bind_param("sssssb", $username, $email, $password, $descripcion, $nombreperfil, $null);
$stmt->send_long_data(5, $foto);


    $stmt->execute();


 if ($stmt->affected_rows > 0) {
  header("Location: ../index.php");
  exit();
} else {
  echo "Error al registrar el usuario.";
}

$stmt->close();
$db->close();
}
?>
