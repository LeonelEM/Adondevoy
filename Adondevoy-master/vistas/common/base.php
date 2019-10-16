<!DOCTYPE html>

<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Adondevoy.com</title>

    <meta name="description" content="Elegimos por vos">
    <meta name="author" content="Curso PHP 2019">

    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	

    <link href="css/estilo.css" rel="stylesheet">
	

  </head>
  <body>

    <div class="container-fluid p-0">

    	<header>
			<div class="row">
				<div class="col-md-12">
					<nav class="navbar navbar-expand-lg navbar-light">
						 
						<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
							<span class="navbar-toggler-icon"></span>
						</button> <a class="navbar-brand" href="index.php"><img src="resources/images/logo.png"></a>
						<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

							<ul class="navbar-nav ml-md-auto">
								

								<?php 
								if ( !isset($_SESSION["usuario"]) ){ ?>
									<li class="nav-item">
										 <a  data-toggle="modal" data-target="#Modal2" class="nav-link" href="#"><div class="light">Creá tu cuenta</div></a>
									</li>

									<li class="nav-item">
										 <a data-toggle="modal" data-target="#Modal1" class="nav-link" href="#"><div class="light">Ingresá</div></a>
									</li>
								<?php 
								}
								else{
								?>
									<li class="nav-item dropdown">
										 <a class="nav-link dropdown-toggle" href="" id="navbarDropdownMenuLink" data-toggle="dropdown"><?= $_SESSION["usuario"] ?></a>
										<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
											 <a class="dropdown-item" href="#"><div class="light">Cuenta</div></a>
											 
											 <a class="dropdown-item" href="index.php?m=logout"><div class="light">Salir</div></a>
										</div>
									</li>
								<?php 
								}
								?> 
							</ul>

						</div>
					</nav>
					
				</div>
			</div>


			<div class="row mt-2 pb-4">
				
				<div class="col-12">

					<form class="col-md-7 mx-auto">
					  <div class="form-row justify-content-center">

						<div class="cols-xs-12 col-md-3 my-2">
					      <select id="categoria" name="categoria" class="custom-select">
						  <option value="0">Todas las categorias</option>
														<?php
								
								$conexion = new mysqli("localhost", "root", "", "adondevoydb");

								$sql = "SELECT * FROM categories";

								$resultado = $conexion->query($sql);

								foreach ($resultado as $post) {
									?><option value="<?php echo $post["category_id"]?>"><?php echo $post["category"]?></option>
									<?php ;
									
								}


								?>

					      </select>
						</div>

						<div class="cols-xs-12 col-md-7 my-2">
					      <input id="buscar" name="buscar" placeholder="Buscar" type="text" class="form-control">
						</div>

						<div class="my-2">
					      <button onclick="enviarBusqueda();" name="submit" type="button" class="btn btn-primary">Buscar</button>
						</div>
						
						<?php 
							if ( isset($_SESSION["usuario"]) ){ ?>
								<div class="mt-4 mb-2">					    
		   					    	<a href="index.php?only_favs" class="mx-4">Favoritos</a>

									<a href="#" class="mx-4">Historial</a>

									<a href="index.php?m=posts&a=new" class="mx-4" name="publicar">Publicar Review</a>

									<a href="index.php?m=posts&a=list" class="mx-4" name="publicar">Mis Reviews</a>
								</div>
						<?php } ?>

					  </div>

					</form>

				</div>
			</div>
		</header>


		
		<?php 

			$tipo_alerta = "danger";

			if ( isset($_GET["s"] ) ){
				$mensaje_alerta = $_GET["s"];
				$tipo_alerta = $_GET["t"]; //Tipo de alerta

			}


			if ( isset($mensaje_alerta) ){?>

		  <div class="alert alert-<?=$tipo_alerta?> alert-dismissible fade show text-center">
		    <button type="button" class="close" data-dismiss="alert">&times;</button>
		    <?= $mensaje_alerta ?>
		  </div>
			
		</div>

		<?php 

			}

		?>



	<div class="row">

		<div class="col-md-12">

			<?php if(isset($content_section1)){include( $content_section1 );} ?>

			<?php if(isset($content_section2)){include( $content_section2 );} ?>

	</div>

	<!-- Modal de ingreso -->
	<div class="modal fade" id="Modal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLabel">Ingresar a tu cuenta</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">

			<div class="row justify-content-center">
				<div class="col-md-8">
					<form action="index.php" role="form" method="POST">

						<input type="hidden" name="m" value="login">

						<div class="form-group">
							 
							<label for="user_name">Nombre de usuario</label>

							<input type="text" class="form-control" name="user_name" id="user_name" />
						</div>

						<div class="form-group">
							 
							<label for="password">Contraseña</label>

							<input type="password" class="form-control" name="password" id="password" />
						</div>

						<button type="submit" class="btn btn-primary">
							Ingresar
						</button>

					</form>
				</div>
			</div>

	      </div>
	      
	    </div>
	  </div>
	</div>

<!-- Modal de Registro -->

	<div class="modal fade" id="Modal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLabel">Registrate</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">

			<div class="row justify-content-center">
				<div class="col-md-8">
					<form action="index.php" role="form" method="POST">

						<input type="hidden" name="m" value="register">

						<div class="form-group">
							 
							<label for="username">Usuario</label>
							<input required name="username" type="text" id="username" class="form-control" onBlur="checkAvailability()"><span id="user-availability-status"></span>
				
						</div>

						<div class="form-group">
							 
						<label for="email">Email</label>
							<input required name="email" type="text" id="email" class="form-control" onBlur="checkAvailability2()"><span id="email-availability-status"></span>
						</div>

						<div class="form-group">

						<label for="password2">Contraseña</label>
						
							<input type="password" class="form-control" name="password2" id="password2" required />
						</div>

						<button type="submit" class="btn btn-primary">
							Enviar
						</button>

					</form>
				</div>
			</div>

	      </div>
	      
	    </div>
	  </div>
	</div>


 <script src="vendor/jquery/jquery-3.4.1.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<script>

function checkAvailability() {
	$("#loaderIcon").show();
	jQuery.ajax({
	url: "check_username.php",
	data:'username='+$("#username").val(),
	type: "POST",
	success:function(data){
		$("#user-availability-status").html(data);
		$("#loaderIcon").hide();
	},
	error:function (){}
	});
}
function checkAvailability2() {
	$("#loaderIcon").show();
	jQuery.ajax({
	url: "check_username.php",
	data:'email='+$("#email").val(),
	type: "POST",
	success:function(data){
		$("#email-availability-status").html(data);
		$("#loaderIcon").hide();
	},
	error:function (){}
	});
}
</script>

<p><img src="resources/images/LoaderIcon.gif" id="loaderIcon" style="display:none" /></p>

    <script type="text/javascript">
    	
    	function enviarBusqueda(){
    		
			var urlBusqueda = 'index.php?buscar=' + $("#buscar").val() +
							  '&categoria=' + $("#categoria").val() + 
							  '&orden=' + $("#orden").val();

			window.setTimeout( window.location = urlBusqueda, 100 );	

	    }


    </script>

	<script>
	// Get the modal
	var modal = document.getElementById('id01');

	// When the user clicks anywhere outside of the modal, close it
	window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
		}		

	</script> 






  </body>
</html>