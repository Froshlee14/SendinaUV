<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title> SENDINA </title>
	
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
	<link rel="stylesheet" href="<?php echo constant('URL') ?>public/css/custom.css">
</head>


<style>
@media (max-width: 991px) {
    .navbar-nav.d-none.d-lg-flex {
        display: flex !important;
        flex-direction: row;
    }
}
</style>

<body>


<div class="sticky-top bg-white border">

	<nav class=" navbar navbar-expand-lg container"> 
		
			<div class="navbar-nav mr-auto ">

				<ul class="navbar-nav me-4 my-3 my-lg-0 d-flex flex-row">
					<li class="nav-item">
						<a class="nav-link btn btn-link btn-transparent	py-0 mr-5 text-secondary" href="<?php echo constant('URL') ?>inicio">
							<i class="bi bi-house-fill"></i> Inicio
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link btn btn-link btn-transparent py-0 mr-5 text-secondary" href="<?php echo constant('URL') ?>sendero/lista">
							<i class="bi bi-signpost-2-fill"></i> Senderos
						</a>
					</li>
					<!--<li class="nav-item">
						<a class="nav-link btn btn-link btn-transparent py-0 mr-3 text-secondary" href="<?php echo constant('URL') ?>sendero/lista">
							<i class="bi bi-person-square"></i> Conócenos
						</a>
					</li> -->
					
					<li class="nav-item">
						<a class="nav-link btn btn-link btn-transparent py-0 mr-5 text-secondary" href="#download">
							<i class="bi bi-question-circle-fill"></i> Ayuda
						</a>
					</li>
					<!--li class="nav-item"><a class="nav-link btn btn-link" href="<?php echo constant('URL') ?>usuario/lista">Usuarios</a></li-->
				</ul>
			</div>
			
		<button class="navbar-toggler ml-auto bg-secondary" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<i class="bi bi-list text-white"></i>
		</button>

		<div class="collapse navbar-collapse" id="navbarSupportedContent">

			<div class="navbar-nav ml-auto">
				<ul class="navbar-nav me-4 my-3 my-lg-0">

					<?php if(!isset($_SESSION['user_id'])){ ?>
					<li class="nav-item">
						<a class="nav-link btn btn-link btn-transparent py-0 mr-5 text-secondary" href="<?php echo constant('URL') ?>login">
							<i class="bi bi-door-open-fill"></i> Iniciar sesion
						</a>
					</li>
					<?php }else{?>
						<?php if($_SESSION['user_rol'] === "Administrador"){ ?>
							<li class="nav-item">
								<a class="nav-link btn btn-link btn-transparent py-0 mr-5 text-secondary" href="<?php echo constant('URL') ?>usuario/lista">
									<i class="bi bi-people-fill"></i> Usuarios
								</a>
							</li>
						<?php } ?>
						<li class="nav-item">
							<a class="nav-link btn btn-link btn-transparent py-0 mr-5 text-secondary" href="<?php echo constant('URL') ?>login/salir">
								<i class="bi bi-door-closed-fill"></i> 
								<?php		
								if(isset($_SESSION['user_id'])){
									echo $_SESSION['user_rol']; 
								}
								?>
								 - Cerrar sesion
							</a>
						</li>
					<?php } ?>
				</ul>
			</div>

		</div>
	</nav>
</div>

</body>

</html>