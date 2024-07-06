<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title> SENDINAUV </title>
	
	<!-- <link rel="stylesheet" href="<?php echo constant('URL') ?>public/css/styles.css">  -->
	<!-- <link rel="stylesheet" href="<?php echo constant('URL') ?>public/css/meyawo.css"> -->
	
</head>


<body>

	<nav class="navbar navbar-expand-lg navbar-light  shadow-sm" id="mainNav"> 
		<div class="container px-5">
			<a class="navbar-brand fw-bold" href="<?php echo constant('URL') ?>inicio"> SENDINAUV </a>
			

			<div class="collapse navbar-collapse" id="navbarResponsive">
				<ul class="navbar-nav ms-auto me-4 my-3 my-lg-0">
					<li class="nav-item"><a class="nav-link me-lg-3" href="<?php echo constant('URL') ?>sendero/lista">Senderos</a></li>
					<li class="nav-item"><a class="nav-link me-lg-3" href="#download">Ayuda</a></li>
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