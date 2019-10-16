<?php
    session_start();

    $conexion = new mysqli("localhost", "root", "", "adondevoydb");
    

    $modulo = "index";

    if ( isset($_REQUEST["m"]) )
    {
        switch( $_REQUEST["m"] ){

            case "post":
            $modulo = "post";
            break;
        
            case "post-index":
            $modulo = "post-index";
            break;

            case "reviews":
                $modulo = "reviews";
                break;

            case "logout":
                $modulo = "logout";
                break;

            case "login":
                $modulo = "login";
                break;

            
            case "register":
                $modulo = "register";
                break;
                    
            case "default":
                echo "error404";

        }
    }

    include('vistas/' . $modulo . '/index.php'); 

?>