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

	<nav class="navbar navbar-expand-lg navbar-light  shadow-sm" id="mainNav"> 
		<div class="container px-5">
			
			<div class="navbar-nav mr-auto ">
				<a class="navbar-brand fw-bold" href="<?php echo constant('URL') ?>inicio"> SENDINAUV </a>
			</div>

			<div class=" collapse navbar-collapse" id="navbarResponsive">
				<ul class="navbar-nav me-4 my-3 my-lg-0 ml-auto">
					<li class="nav-item"><a class="nav-link me-lg-3" href="<?php echo constant('URL') ?>sendero/lista">Senderos</a></li>
					<li class="nav-item"><a class="nav-link me-lg-3" href="#download">Ayuda</a></li>
					<li class="nav-item"><a class="nav-link me-lg-3" href="<?php echo constant('URL') ?>usuario/lista">Usuarios</a></li>
				</ul>
				<button class="btn btn-primary rounded-pill px-3 mb-2 mb-lg-0 " data-bs-toggle="modal" data-bs-target="#feedbackModal">
					<span class="d-flex align-items-center">
						<i class="bi-list me-2"></i>
						<span class="small">Iniciar sesion</span>
					</span>
				</button>
			</div>
		</div>
	</nav>

	
</body>

</html>