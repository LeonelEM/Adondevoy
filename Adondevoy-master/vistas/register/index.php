<?php 
 if ( isset( $_POST["username"] ) && isset( $_POST["email"]  )  && isset( $_POST["password2"] )  &&
                    $_POST["username"] != "" && $_POST["email"] != ""  && $_POST["password2"] != "" ){
                    
                       $db = new mysqli("localhost", "root", "", "adondevoydb");
                $query = "INSERT INTO users (username, email, password) 
                        VALUES ('$username', '$email', '".md5($password)."')";
                $resultado = mysqli_query($db, $query);
          
                
                }
        

 ?>
   <?php
    $content_section1 =   "vistas/index/partials/slider_ads.inc.php";
    $content_section2 =  "vistas/index/partials/content_index.inc.php";
    

    include(    'vistas/common/base.php' );


    ?>   

