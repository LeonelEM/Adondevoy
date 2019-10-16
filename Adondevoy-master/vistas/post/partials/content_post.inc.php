<?php
include_once(  "modelo/DAOs/postsDAO.php");
$registros = buscarPublicacion( $_REQUEST["id"] );
$publicacion = mysqli_fetch_assoc($registros);
?>

<div class="container-fluid">
    <div class="row px-5 mx-5">
        <div class="col-md-6 ">
            <img class="ml-5 img-fluid w-75 border border-warning" alt="" src="resources/images/<?php $publicacion["image"]?>" />
            
            <p class="ml-5 img-fluid w-75 pt-5">
                <?=$publicacion["description"]?>
            </p>
        </div>
        <div class="col-md-6 ">
            <h2>
                <?=$publicacion["title"]?>
            </h2>
         

        </div>
    </div>
</div>