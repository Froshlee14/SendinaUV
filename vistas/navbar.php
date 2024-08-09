

<div class="sticky-top">

	<nav class="navbar navbar-expand-lg  border-bottom bg-white"> 
	
		<button class="navbar-toggler ml-auto " type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon py-1"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarSupportedContent">

			<div class="navbar-nav mr-auto ">

				<ul class="navbar-nav me-4 my-3 my-lg-0">
					<li class="nav-item">
						<a class="nav-link btn btn-link btn-transparent	py-1 mr-2 text-secondary" href="<?php echo constant('URL') ?>inicio">Inicio</a>
					</li>
					<li class="nav-item">
						<a class="nav-link btn btn-link btn-transparent py-1 mr-2 text-secondary" href="<?php echo constant('URL') ?>sendero/lista">Senderos</a>
					</li>
					<li class="nav-item">
						<a class="nav-link btn btn-link btn-transparent py-1 mr-2 text-secondary" href="#download">Ayuda</a>
					</li>
					<!--li class="nav-item"><a class="nav-link btn btn-link" href="<?php echo constant('URL') ?>usuario/lista">Usuarios</a></li-->
				</ul>
			</div>

			<div class="navbar-nav ml-auto">
				<ul class="navbar-nav me-4 my-3 my-lg-0">
				<li class="nav-item dropdown">

					<a class="nav-link text-secondary dropdown-toggle py-1" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
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



<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	