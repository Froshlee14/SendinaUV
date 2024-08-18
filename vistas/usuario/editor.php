<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Sendina - Editor</title>
	<link rel="icon" type="image/x-icon" href="<?php echo constant('URL') ?>/public/imgs/icon.ico">
</head>

<body class="bg-sendina">

	<?php  require 'vistas/navbar.php' ?>
	
	<div class="bg-secondary border-bottom border-dark sticky-2 p-1">
		<div class="container">
			<span class="text-white"> 
				<a href="<?php echo constant('URL') ?>usuario/lista"
				class="btn btn-secondary p-0 text-white">
					<i class="bi bi-list-ul"></i> Usuarios
				</a>
				<a href="#" class="btn btn-secondary p-0 text-dark mx-0">
					/ Detalles de usuario 
				</a>
			</span>
		</div>
	</div>


	<?php  require 'vistas/header.php' ?>
	
	<div class="container w-md-75 bg-white p-5 mt-4 mb-4 border-0 rounded">
	
		<form  class="form-card" action="<?php echo constant('URL') ?>usuario/guardar" method="post" id="senderoForm">
	
			<h3 class="mt-0 mb-4 text-center"> Detalles de usuario </h3>
		
			<div class="card mb-4">
			
				<?php 
					//var_dump($this->usuario); 
					//require_once 'entidades/SenderoBean.php';
					//var_dump($this->zona_lista);
					
					$id_usuario = 0;
					$nombre = '';
					$contrasena = '';
					$id_rol_usuario = 1;
					
					if($this->usuario !== null){
						$id_usuario = $this->usuario->get_id_usuario();
						$nombre = $this->usuario->get_nombre();
						$contrasena = $this->usuario->get_contrasena();
						$id_rol_usuario = $this->usuario->get_id_rol_usuario();
					}
					
				?>
				
				<div class="card-body form-card bg-light">

					<p>
						<!-- <label for="id_usuario">ID usuario</label> -->
						<input type="hidden" name="id_usuario" value="<?php echo $id_usuario; ?>" required>
					</p>
						
					<div class="row">
						<div class="col-12">
							<div class="input-group"> 
								<input type="text" name="nombre" placeholder="Usuario" value="<?php echo $nombre ?>" maxlength="20" required> 
								<label>Nombre de usuario</label> 
							</div>
						</div>
					</div>
					
					<div class="row">
						<div class="col-12">
							<div class="input-group"> 
								<input type="password" name="contrasena" placeholder="" value="<?php echo $contrasena ?>" maxlength="20" required> 
								<label>Contraseña</label> 
							</div>
						</div>
					</div>
					
					<div class="row">
						<div class="col-12 ">
							<div class="input-group"> 
								<select id="id_rol_usuario" name="id_rol_usuario">
									<option value="" disabled selected>Selecciona tipo de usuario</option>
									<?php foreach ($this->rol_usuario_lista as $tu){ ?>
										<option value="<?= $tu->get_id_rol_usuario() ?>" <?= $tu->get_id_rol_usuario() == $id_rol_usuario ? 'selected' : '' ?>>
										<?php echo $tu->get_rol_usuario(); ?>
										</option>
									<?php } ?>
								</select>
								<label>Tipo de usuario</label> 
							</div>
						</div>
					</div>
					
				</div>
			</div>
			
			
			<!-- No usar input, el css de los input text tambien le afecta -->
			<!-- <input class="btn btn-primary text-light" type="submit" value="Guardar"> -->
			<button class="btn btn-success btn-block text-light mb-3 " type="submit">Guardar cambios</button>
			
			<?php 
			if($this->usuario !== null){
				//No se puede borrar el administrador principal
				if($id_usuario != 1){
			?>
			
				<button type="button" class="btn-block btn btn-danger text-light" data-toggle="modal" data-target="#exampleModal">
					Borrar usuario
				</button>
			<?php 
				}
			}
			?>	
			
			
		</form>
		
		<p> <?php echo $this->mensaje; ?></p>

	</div>
	
	<?php  require 'vistas/footer.php' ?>
		
	<!-- Modal -->
	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<h5 class="modal-title" id="exampleModalLabel">Precaución</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			</button>
		  </div>
		  <div class="modal-body">
			Esta accion es irreversible.
		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
			<!-- <button type="button" class="btn btn-danger">Borrar sendero</button> -->
			<a  class=" btn btn-danger text-light" href="<?php echo constant('URL') ?>usuario/borrar/<?php echo $id_usuario ?>"> Borrar</a>
		  </div>
		</div>
	  </div>
	</div>
	
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	
		
</body>

</html>