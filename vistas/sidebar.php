<div class="bg-light border-right" id="sidebar-wrapper">
	<div class="sidebar-heading"><strong>SENDINA</strong></div>
	
	<div class="list-group list-group-flush"> 
	
		<a href="<?php echo constant('URL') ?>inicio" class="tabs list-group-item list-group-item-action bg-light">
			<div class="list-div my-2">
				<i class="bi bi-house-door-fill"></i> Inicio
			</div>
		</a> 
		
		<a href="<?php echo constant('URL') ?>sendero/lista" class="tabs list-group-item list-group-item-action bg-light">
			<div class="list-div my-2">
				<i class="bi bi-geo-alt-fill"></i> Senderos
			</div>
		</a> 
		
		<a href="#menu1" class="tabs list-group-item list-group-item-action bg-light">
			<div class="list-div my-2">
				<i class="bi bi-question-circle-fill"></i> Ayuda
			</div>
		</a> 
		
		<?php if(isset($_SESSION['user_id'])){ ?>
		
			<?php if($_SESSION['user_rol'] === "Administrador"){ ?>
				<a href="<?php echo constant('URL') ?>usuario/lista" class="tabs list-group-item list-group-item-action bg-light">
					<div class="list-div my-2">
						<i class="bi bi-people-fill"></i> Gestionar usuarios
					</div>
				</a> 
			<?php } ?>
			
			<a href="<?php echo constant('URL') ?>login/salir" class="tabs list-group-item list-group-item-action bg-light">
				<div class="list-div my-2">
					<i class="bi bi-box-arrow-left"></i> Cerrar sesión
				</div>
			</a> 
		

		<?php }else{?>
		
			<a href="<?php echo constant('URL') ?>login" class="tabs list-group-item list-group-item-action bg-light">
				<div class="list-div my-2">
					<i class="bi bi-box-arrow-right"></i> Iniciar sesión
				</div>
			</a> 
			
		<?php } ?>
		
		<div class="text-secondary list-group-item list-group-item-action bg-light">
			Sesion iniciada como 
			<?php 
			if(isset($_SESSION['user_id'])){
				echo $_SESSION['user_rol']; 
			}
			else{
			?>
			invitado
			<?php } ?>
		</div>
		
		
	</div>
</div>