<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title> SENDINAUV </title>
	
	<!-- <link rel="stylesheet" href="<?php echo constant('URL') ?>public/css/styles.css">  -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
	<script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
	
</head>


<body>

	<div class="jumbotron bg-primary text-center mb-0">
		<img src="logo.png" width="320" title="logo">
	</div>

	<nav class="navbar navbar-expand-lg navbar-light  shadow-sm"> 
		<div class="container px-5">
		
		<a class="navbar-brand" href="#">SENDINA</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
			
			<div class="navbar-nav mr-auto ">
				
				<ul class="navbar-nav me-4 my-3 my-lg-0">
					<li class="nav-item"> <a class="nav-link me-lg-3" href="<?php echo constant('URL') ?>inicio">Inicio</a></li>
					<li class="nav-item"> <a class="nav-link me-lg-3" href="<?php echo constant('URL') ?>sendero/lista">Senderos</a></li>
					<li class="nav-item"> <a class="nav-link me-lg-3" href="#download">Ayuda</a></li>
					<!--li class="nav-item"><a class="nav-link me-lg-3" href="<?php echo constant('URL') ?>usuario/lista">Usuarios</a></li-->
				</ul>
			</div>

			<div class="navbar-nav ml-auto">
				<ul class="navbar-nav me-4 my-3 my-lg-0">
				<li class="nav-item dropdown">

					<a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
					Sesion iniciada como invitado
					</a>
					<div class="dropdown-menu">
						<a class="dropdown-item" href="#">Iniciar sesion</a>
						<a class="dropdown-item" href="<?php echo constant('URL') ?>usuario/lista">Gestionar usuarios</a>
					</div>
				</li>
				</ul>
			</div>
			
			</div>
			
		</div>
	</nav>

	
</body>

</html>