
			

			<!--Barra de filtros de busqueda-->

			<div class="row">
				<div class="col-md-12">
					<nav class="navbar navbar-expand-lg navbar-light bg-light ">
						 
						<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
							<span class="navbar-toggler-icon"></span>
						</button> 
						<div class="collapse navbar-collapse justify-content-center" id="bs-example-navbar-collapse-1">
							<ul class="navbar-nav">
								<li class="nav-item ">
									 
									  	<form class="form-inline">
											
									  		<div class="form-group my-2 col-sm-12">
												<label class=" mx-2"  for="orden">Ordenar por:</label>

										      <select id="orden" name="orden" class="custom-select">
										        <option value="0">Mas recomendados</option>
										        
										        <option value="1" <?php if ( isset($_GET["orden"]) && $_GET["orden"] == 1){ ?> selected="selected" <?php } ?> >Menos recomendados</option>
										      </select>
											
												<button onclick="enviarBusqueda();" class="btn btn-primary  my-2 my-sm-0" type="button">
													Filtrar
												</button>
											</div>
										</form>

									
								</li>
								
							</ul>

							
						</div>
					</nav>
				</div>
			</div>

			<div class="card-columns">
             
         
          
            <?php
  
             $conexion = new mysqli("localhost", "root", "", "adondevoydb");
  
             $sql = "SELECT * FROM post";
  
             $resultado = $conexion->query($sql);
  
             foreach ($resultado as $post) {
				?><div class="card">
				<img src="resources/images/<?php echo $post["image"]?>" class="card-img-top" alt="<?php echo $post["title"]?>">
				<div class="card-body">
				  <h5 class="card-title"><?php echo $post["title"]?></h5>
				  <p class="card-text"><?php echo  $post["content"]?></p>
				  <a href="#" class="btn btn-primary">Ver mas</a>
				</div>
			  </div><?php ;
				
             }

  
            ?>
  
  
			
  
     </div>

			<!--FIN Barra de filtros de busqueda-->

			<!--Listado de publicaciones--> <div class="m-5 row">				
				<?php

include ($content_list);

?>
</div> 

			
			


			<!--FIN Listado de publicaciones -->