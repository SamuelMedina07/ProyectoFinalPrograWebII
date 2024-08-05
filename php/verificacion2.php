<?php
 include("../includes/config/database.php");
 $db = conectarDB();
 global $email;
  $email = $_POST['email'];
  
  $sql="SELECT * FROM users WHERE email = '$email'";

  $rs=$db->query($sql);
  if($rs->num_rows > 0){
    echo "1";
   }else{echo "0"; } 

?>