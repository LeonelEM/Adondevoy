<?php
    include_once 'helpers/html_helper.php';
    include_once 'modelo/DAOs/postsDAO.php';
    include_once 'modelo/DAOs/favoritesDAO.php';
    $busqueda = "";
    if ( isset($_GET["buscar"]) ){
    	$busqueda = $_GET["buscar"];
    }
    $id_categoria = -1;
    if ( isset($_GET["categoria"]) ){
    	$id_categoria = $_GET["categoria"];
    }
    $orden = "Recomendaciones ASC";
    if ( isset($_GET["orden"]) ){
    	if ( $_GET["orden"] == 1){
    		$orden = "Recomendaciones DESC";
    	};
    }
    if ( isset( $_GET["only_favs"]) )
	{
		$pubs = buscarPublicacionesFavoritasUsuario( $_SESSION["id_usuario"] );
	}
	else{
		$pubs = buscarPublicaciones( $busqueda, $id_categoria, $orden);	
	}
    
    $favoritos=[];
    if ( isset( $_SESSION["id_usuario"] ) ) {
    	$favoritos = buscarFavoritosUsuario($_SESSION["id_usuario"]);
    }
	if ($pubs){
		foreach ($pubs as $pub) {
			$es_favorito = in_array( $pub['post_id'], $favoritos);
            crearHTMLCardPublicacion($pub['title'], $pub['description'] . "...", $pub['image'], $pub['post_id'], false, $es_favorito);			   			
		}
    }	?>

   

