	<style>
.nav-link.btn-transparent {
    background-color: transparent; 
    color: #007bff; 
    transition: background-color 0.3s, color 0.3s; 
}

.nav-link.btn-transparent:hover {
    background-color: rgba(0, 123, 255, 0.1); 
    color: #0056b3;
}
</style>

<div class=" sticky-top">

	<nav class="navbar navbar-expand-lg navbar-light shadow-sm bg-light"> 
	
		<button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarSupportedContent">

			<div class="navbar-nav mr-auto ">

				<ul class="navbar-nav me-4 my-3 my-lg-0">
					<li class="nav-item">
						<a class="nav-link btn btn-link btn-transparent	 mr-2" href="<?php echo constant('URL') ?>inicio">Inicio</a>
					</li>
					<li class="nav-item">
						<a class="nav-link btn btn-link btn-transparent mr-2" href="<?php echo constant('URL') ?>sendero/lista">Senderos</a>
					</li>
					<li class="nav-item">
						<a class="nav-link btn btn-link btn-transparent mr-2" href="#download">Ayuda</a>
					</li>
					<!--li class="nav-item"><a class="nav-link btn btn-link" href="<?php echo constant('URL') ?>usuario/lista">Usuarios</a></li-->
				</ul>
			</div>

			<div class="navbar-nav ml-auto">
				<ul class="navbar-nav me-4 my-3 my-lg-0">
				<li class="nav-item dropdown">

					<a class="nav-link text-secondary dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
					Sesion iniciada como 
					<?php 
					//session_start();
					if(isset($_SESSION['user_id'])){
						echo $_SESSION['user_rol']; 
					}
					else{
					?>
						invitado
					<?php } ?>
					</a>
					<div class="dropdown-menu">
					
						<?php if(!isset($_SESSION['user_id'])){ ?>
							<a class="dropdown-item" href="<?php echo constant('URL') ?>login">Iniciar sesion</a>
						<?php }else{?>
							<a class="dropdown-item" href="<?php echo constant('URL') ?>login/salir">Cerrar sesion</a>
							<?php if($_SESSION['user_rol'] === "Administrador"){ ?>
								<a class="dropdown-item" href="<?php echo constant('URL') ?>usuario/lista">Gestionar usuarios</a>
							<?php } ?>
						<?php } ?>

					</div>
				</li>
				</ul>
			</div>

		</div>
	</nav>
</div>
