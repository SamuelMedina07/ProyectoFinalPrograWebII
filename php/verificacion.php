<?php
 include("../includes/config/database.php");
 $db = conectarDB();
 global $username;
  $username = $_POST['username'];
  
  $sql="SELECT * FROM users WHERE username = '$username'";

  $rs=$db->query($sql);
  if($rs->num_rows > 0){
    echo "1";
   }else{echo "0"; } 

?>