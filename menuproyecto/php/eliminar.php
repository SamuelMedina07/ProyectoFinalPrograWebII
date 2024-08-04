<?php
include("conexion.php");
$base = conectarDB();

$id = $_GET['idperfil'];

// Asegúrate de que $id esté definido y sea un número para evitar inyecciones SQL.
$id = intval($id);

$sql = "DELETE FROM perfil WHERE idperfil='" . mysqli_real_escape_string($base, $id) . "'";
$result = mysqli_query($base, $sql);

if ($result) {
    echo "<script language='JavaScript'>
    alert('Registro eliminado correctamente');
    window.location.href = 'tabla.php';
    </script>";
} else {
    echo "<script language='JavaScript'>
    alert('Registro no eliminado');
    window.location.href = 'tabla.php';
    </script>";
}
?>