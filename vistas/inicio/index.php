<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Sendina</title>
	<link rel="icon" type="image/x-icon" href="<?php echo constant('URL') ?>/public/imgs/icon.ico">
</head>

<body class="bg-sendina">

	<?php require 'vistas/navbar.php' ?>
	<?php require 'vistas/header.php' ?>
	
	<div class="container-fluid p-0">
		<div class="container w-md-75 bg-white p-5 mt-4 mb-4 border-0 rounded shadow">
			<h3 class="pb-4 text-primary text-center">¿Qué son los senderos interpretativos?</h3>

			<p class="text-justify">
				Los Senderos Interpretativos son espacios que permiten tener un contacto directo con 
				los visitantes para el desarrollo de una temática o un tópico particular y así, transmitir 
				valores sobre los cuales se quiere dar un mensaje. Cada sendero tiene un objetivo 
				específico que se sustenta en el desarrollo de las actividades, centrando la atención en 
				aspectos con los que el visitante pueda interiorizar y que, a la vez, sirva de hilo conductor 
				de los contenidos del mensaje.
			</p>
			
			<!-- <h3 class="pb-4 text-primary text-center mt-5">Senderos Interpretativos en la Universidad Veracruzana</h3> -->
			<p class="text-justify">
				<img src="<?php echo constant('URL') ?>public/imgs/Luzios/Luzio pensante.png" alt="Senderos Interpretativos"
				class="img-fluid rounded" style="width: 150px; height: 150; float: right; margin: 0 0 15px 15px; object-fit: cover;">
				Para la Universidad Veracruzana los Senderos Interpretativos son espacios de escenarios 
				reales de aprendizaje para los estudiantes. Estos espacios se han destinado a la 
				construcción de proyectos ambientales con enfoques sustentables, siendo una fuente 
				importante de formación de recursos humanos mediante el desarrollo de temas de tesis 
				de grado de licenciatura y posgrado.
			</p>
			<p class="text-justify">
				Actualmente, la Universidad ha implementado 3 senderos interpretativos en sus distintas
				facultades distribuidas en las regiones de Orizaba-Córdoba y Xalapa. El primer sendero 
				desarrollado en 2018 en el Centro Universitario para las Artes, Ciencias y Cultura, 
				Córdoba, el segundo en 2022 en la Universidad Veracruzana Intercultural (UVI), Sede 
				Grandes Montañas y el último en 2023 en la Unidad de Ciencias de la Salud – Xalapa 
				(UCS-X). Nuestros senderos interpretativos comparten una misma visión: la gestión
				integral del agua como objetivo principal para el diálogo y la reflexión, pero cada uno 
				abordado desde un tópico diferente, como son: la importancia de los entornos naturales;
				la relación del hombre, agua y cambio climático; la relación del hombre, agua y salud.
			</p>
			<p class="text-justify">
				Descubre, aprende y diviértete en nuestros recorridos virtuales de los senderos. 
			</p>
			<div class="text-center">
				<a href="<?php echo constant('URL') ?>sendero/lista" class="btn btn-block btn-primary font-weight-bold mt-3 py-2">Ver senderos</a>
			</div>
		</div>
	</div>
	
	<?php require 'vistas/footer.php' ?>
	
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
		

</body>


</html>