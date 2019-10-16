<?php
require_once("vistas/DBController/DBController.php");
$db_handle = new DBController();


if(!empty($_POST["username"])) {
  $query = "SELECT * FROM users WHERE username='" . $_POST["username"] . "'";
  $user_count = $db_handle->numRows($query);
  if($user_count>0) {
      echo "<span class='status-not-available'> Usuario no disponible</span>";
  }else{
      echo "<span class='status-available'> Usuario disponible</span>";
  }
}

if(!empty($_POST["email"])) {
    $query = "SELECT * FROM users WHERE email='" . $_POST["email"] . "'";
    $email_count = $db_handle->numRows($query);
    if($email_count>0) {
        echo "<span class='status-not-available'> Este email ya esta registrado</span>";
    }
  }
?>