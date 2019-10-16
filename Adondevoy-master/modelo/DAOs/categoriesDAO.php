<?php

    include_once  'helpers/database_helper.php';

	function buscarCategorias(){

        $conexion = getConexion();

        $consulta = "SELECT *  
                     FROM categories 
                     ORDER BY description";

        $resultado = $conexion->query( $consulta );

        return $resultado;
	}

    function agregarCategoria( $categoria ){

        $conexion = getConexion();

        $sql = "INSERT INTO categories " . 
                    "(description)" 
                        . " VALUES ('" 
                        . $categoria["descripcion"]
                     . "')";

        $conexion->query( $sql );

    }

    function modificarCategoria( $categoria ){

        $conexion = getConexion();

        $sql = "UPDATE categories " . 
                "SET description = '" . $categoria["descripcion"] .
                "' WHERE category_id = " . $categoria["id"]; 
                       
        $conexion->query( $sql );

    }


    function eliminarCategoria( $categoria ){

        $conexion = getConexion();

        $sql = "DELETE FROM categories 
                 WHERE category_id = " . $categoria["id"]; 
                       
        $conexion->query( $sql );

    }