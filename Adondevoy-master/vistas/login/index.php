<?php 



    if ( isset( $_POST["user_name"] ) && isset( $_POST["password"] ) && 
         $_POST["user_name"] != "" && $_POST["password"] != "" ){

        $conexion = new mysqli("localhost", "root", "", "adondevoydb");
    
        $consulta = "SELECT *  
                     FROM users  
                     WHERE username = '" . $_POST["user_name"] . "' 
                     AND password = '" . $_POST["password"] . "'";

        $resultado = $conexion->query( $consulta );


        if ( $resultado->num_rows == 1  ){

            //Obtengo el nombre del usuario
            
            $usuario = $resultado->fetch_assoc();

            $_SESSION["usuario"] = $usuario["username"];
            $_SESSION["id_usuario"] = $usuario["user_id"];
            

        }
        else{
            $mensaje_alerta = "Usuario y/o contraseña no valida";
        }
    }
    else{
        $mensaje_alerta = "Debe completar el usuario y la contraseña";
    }

    $content_section1 =   "vistas/index/partials/slider_ads.inc.php";
    $content_section2 =  "vistas/index/partials/content_index.inc.php";
    

    include(    'vistas/common/base.php' );
?>