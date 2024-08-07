<?php
require '../includes/config/database.php';


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);


    $db = conectarDB();


    $stmt = $db->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $username, $email, $password); 
    $stmt->execute();


    if ($stmt->affected_rows > 0) {
        header("Location: ../index.php"); 
        exit();
    } else {
        echo "Error al registrar el usuario.";
    }

    $db->close();
}
?>

<div class="container">
  <div class="cookiesContent" id="cookiesPopup">
    <button class="close">✖</button>
    <img src="https://cdn-icons-png.flaticon.com/512/1047/1047711.png" alt="cookies-img" />
    <p>We use cookies for improving user experience, analytics and marketing.</p>
    <button class="accept">That's fine!</button>
  </div>
</div>