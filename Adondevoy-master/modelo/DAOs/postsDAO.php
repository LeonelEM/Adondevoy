<?php

    include_once 'helpers/database_helper.php';

	function buscarPublicaciones($busqueda, $id_categoria, $orden){
        $conexion = getConexion();
        $consulta = "SELECT post_id, title, SUBSTRING(description, 1, 100) AS description, post_recomendaciones, category_id, image 
                  FROM post ";
        if ( $busqueda != "" ){
           $consulta .= " WHERE (title LIKE '%" . $busqueda . "%' OR description LIKE '%" . $busqueda . "%')";
        }
        if ( $id_categoria >= 0 )
        {
            $consulta .= " category_id = " . $id_categoria;
        }
        $consulta .= " ORDER BY " . $orden;
        $resultado = $conexion->query( $consulta );
        return $resultado;
	}
    function buscarPublicacion( $id_publicacion ){
        $conexion = getConexion();
        $consulta = "SELECT * 
                  FROM post  
                  WHERE Post_id = " . $id_publicacion;
        $resultado = $conexion->query( $consulta );
        return $resultado;
    }
 
   function buscarPublicacionesFavoritasUsuario( $id_usuario ){
        $conexion = getConexion();
        $consulta = "SELECT pub_id, pub_titulo, SUBSTRING(pub_descripcion, 1, 100) AS pub_descripcion, pub_precio, pub_id_categoria, pub_id_usuario, pub_id_tipo_publicacion, pub_imagen " . 
                  "FROM publicaciones " . 
                  "WHERE pub_id IN ( SELECT  fav_usr_id_publicacion  FROM favoritos_usuarios WHERE fav_usr_id_usuario = " . $id_usuario . ")";
        $resultado = $conexion->query( $consulta );
        return $resultado;
    }
    function eliminarPublicacion( $id_publicacion ){
        $conexion = getConexion();
        $sql = "DELETE FROM post " .         
               " WHERE post_id = " . $id_publicacion;
        $resultado = $conexion->query( $sql );
    }
    function agregarReview( $publicacion ){
        $conexion = getConexion();
        $sql = "INSERT INTO reviews " . 
                    "(content, image)" 
                        . " VALUES ('" 
                        . $publicacion["content"] . "', '"
                        . $publicacion["image"] . "'"
                     . ")";
        $conexion->query( $sql );
    }
    function modificarPublicacion( $publicacion ){
        $conexion = getConexion();
        $sql = "UPDATE post SET " . 
                    "title= \"" . $publicacion["titulo"] . "\"" .
                    ", description=\"" . $publicacion["descripcion"] . "\"". 
                    ", category_id=" . $publicacion["id_categoria"];
        if ( $publicacion["imagen"] ){
            $sql .= ", image=\"" . $publicacion["imagen"] . "\"";
        }
        
        $sql .= " WHERE post_id = " . $publicacion["id"];
        $conexion->query( $sql );
    }

    function buscarReviewsUsuario( $id_usuario ){
        $conexion = getConexion();
        $consulta = "SELECT post_id, review_id *
                  FROM user_post_review
                  WHERE user_id = " . $id_usuario;
        $resultado = $conexion->query( $consulta );
        return $resultado;
    }
?>