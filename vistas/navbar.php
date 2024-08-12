
<div class="sticky-top bg-white border" style="background-color: #e3f2fd;">

	<nav class=" navbar navbar-expand-lg container"> 
	

		<button class="navbar-toggler ml-auto bg-secondary" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<i class="bi bi-list text-white"></i>
		</button>

		<div class="collapse navbar-collapse" id="navbarSupportedContent">

			<div class="navbar-nav mr-auto ">

				<ul class="navbar-nav me-4 my-3 my-lg-0">
					<li class="nav-item">
						<a class="nav-link btn btn-link btn-transparent	py-0 mr-3 text-secondary" href="<?php echo constant('URL') ?>inicio">
							<i class="bi bi-house-door-fill"></i> Inicio
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link btn btn-link btn-transparent py-0 mr-3 text-secondary" href="<?php echo constant('URL') ?>sendero/lista">
							<i class="bi bi-signpost-2-fill"></i> Senderos
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link btn btn-link btn-transparent py-0 mr-3 text-secondary" href="#download">
							<i class="bi bi-question-circle-fill"></i> Ayuda
						</a>
					</li>
					<!--li class="nav-item"><a class="nav-link btn btn-link" href="<?php echo constant('URL') ?>usuario/lista">Usuarios</a></li-->
				</ul>
			</div>
			
			<div class="navbar-nav ml-auto ">
				<ul class="navbar-nav me-4 my-3 my-lg-0">
				


					<?php if(!isset($_SESSION['user_id'])){ ?>
					<li class="nav-item">
						<a class="nav-link btn btn-link btn-transparent py-0 mr-3 text-secondary" href="<?php echo constant('URL') ?>login">
							<i class="bi bi-door-open-fill"></i> Iniciar sesion
						</a>
					</li>
					<?php }else{?>
						<?php if($_SESSION['user_rol'] === "Administrador"){ ?>
							<li class="nav-item">
								<a class="nav-link btn btn-link btn-transparent py-0 mr-3 text-secondary" href="<?php echo constant('URL') ?>usuario/lista">
									<i class="bi bi-people-fill"></i> Usuarios
								</a>
							</li>
						<?php } ?>
						<li class="nav-item">
							<a class="nav-link btn btn-link btn-transparent py-0 mr-3 text-secondary" href="<?php echo constant('URL') ?>login/salir">
								<i class="bi bi-door-closed-fill"></i> Cerrar sesion
							</a>
						</li>
					<?php } ?>
				</ul>
			</div>

			

		</div>
	</nav>
</div>
