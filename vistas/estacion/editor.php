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
				<a href="<?php echo constant('URL') ?>sendero/lista"
				class="btn btn-secondary p-0 text-white">
					<i class="bi bi-list-ul"></i> Senderos 
				</a>
				/ 
				<a href="<?php echo constant('URL') ?>sendero/editar/<?php echo $_SESSION['id_sendero']?>"
				class="btn btn-secondary p-0 text-white mx-0">
					Sendero 
				</a>
				<a href="#" class="btn btn-secondary p-0 text-dark mx-0">
					/ Detalles de estación 
				</a>
			</span>
		</div>
	</div>

	<?php  require 'vistas/header.php' ?>

	
	<div class="container w-md-75 bg-white p-5 mt-4 mb-4 border-0 rounded">
	
		<form class="form-card" action="<?php echo constant('URL') ?>estacion/guardar" method="post" id="estacionForm">
	
			<h3 class="mt-0 mb-4 text-center"> DETALLES DE ESTACIÓN </h3>

			<div class="card mb-4">
				
				<?php 
					//var_dump($this->estacion); 
					//require_once 'entidades/SenderoBean.php';
					//var_dump($this->zona_lista);
					
					$id_estacion = 0;
					$numero = $this->numero;
					$nombre = '';
					$descripcion = '';
					$latitud ='';
					$longitud = '';
					
					if($this->estacion !== null){
						$id_estacion = $this->estacion->get_id_estacion();
						$numero = $this->estacion->get_numero();
						$nombre = $this->estacion->get_nombre();
						$descripcion = $this->estacion->get_descripcion();
						$latitud = $this->estacion->get_latitud();
						$longitud = $this->estacion->get_longitud();
					}
				?>
				
				<div class="card-body form-card bg-light">

					<p>
						<input type="hidden" name="id_estacion" value="<?php echo $id_estacion; ?>" required>
					</p>
					
					<div class="row">
						
						<div class="col-12 col-sm-3">
							<div class="input-group"> 
								<input type="number" name="numero" placeholder="0" value="<?php echo $numero?>" required> 
								<label>Numero</label> 
							</div>
						</div>
						
						<div class="col-12 col-sm-9">
							<div class="input-group">
								<input type="text" name="nombre" placeholder="Estación" value="<?php echo $nombre ?>" maxlength="50" required> 
								<label>Nombre de la estación</label> 
							</div>
						</div>
					
					</div>
					
					<div class="row">
						<div class="col">
							<div class="input-group"> 
								<textarea name="descripcion" rows="6"><?php echo $descripcion ?> </textarea>
								<label>Descripción</label> 
							</div>
						</div>
					</div>
					
					<div class="row">
						
						<div class="col-12 col-sm-6">
							<div class="input-group"> 
								<input type="number" name="latitud" placeholder="0.0" maxlength="20" value="<?php echo $latitud?>" required> 
								<label>Latitud</label> 
							</div>
						</div>
						
						<div class="col-12 col-sm-6">
							<div class="input-group">
								<input type="number" name="longitud" placeholder="0.0" maxlength="20" value="<?php echo $longitud ?>" required> 
								<label>Longitud</label> 
							</div>
						</div>
					
					</div>
					
				</div>

			</div>
			
			<!-- No usar input, el css de los input text tambien le afecta -->
			<!-- <input class="btn btn-primary text-light" type="submit" value="Guardar"> -->
			<button class="btn btn-block btn-success text-light mb-3" type="submit"
			<?php if($this->estacion !== null) echo 'disabled'; ?> id="btnGuardar">Guardar cambios</button>
			
			<?php
			if($this->estacion !== null){ 
				if($_SESSION['user_rol']=="Administrador"){
			?>
				<button type="button" class="btn-block btn btn-danger text-light" data-toggle="modal" data-target="#exampleModal">
					Borrar estación
				</button>
			<?php
				}
			}				
			?>
		
		</form>
		
		<p> <?php echo $this->mensaje; ?></p>
		
	</div>
	
	
	<?php if($id_estacion != 0){ ?>
		
	<div class="container w-md-75 bg-white p-5 mt-4 mb-5 border-0 rounded">
		
		<h5 class="mt-0 mb-4 text-center"> RECURSOS DE ESTACIÓN </h5>
		
		<?php if($_SESSION['user_rol']=="Administrador"){ ?>
			<a class="btn btn-block btn-primary ml-auto mb-3"  href="<?php echo constant('URL').'recurso/editar/0/'.(sizeof($this->recurso_lista)+1)?>"> Nuevo recurso </a>
		<?php } ?>	
			
		<div class="card mb-4">
			
			<div class="card-body form-card bg-light">
			
				<?php
				if(sizeof($this->recurso_lista) > 0){
					//var_dump($this->estacion_lista); 
					foreach ($this->recurso_lista as $recurso){
				?>
				
				<ul class="list-group list-group-flush p-2">
					<li class="list-group-item border">
						<div> 
							<?php echo $recurso->get_numero(); ?>: <?php echo $recurso->get_tipo_recurso(); ?> 
							<a class="btn btn-secondary float-right" href="<?php echo constant('URL').'recurso/editar/'.$recurso->get_id_recurso().'/'.(sizeof($this->recurso_lista)+1)?>"> Editar </a>
							<!-- <a href="<?php echo constant('URL').'estacion/eliminar/'.$recurso->get_id_recurso(); ?>"> Eliminar </a> -->
						</div>
					</li>
				</ul>
				
				<?php
					}
				}
				else{
					echo "No hay recursos";
				}
				?>
					
			</div>
		</div>

	</div>
	
	<?php } ?>
	
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
			<a  class=" btn btn-danger text-light" href="<?php echo constant('URL') ?>estacion/borrar/<?php echo $id_estacion ?>"> Borrar</a>
		  </div>
		</div>
	  </div>
	</div>
	
	<script>
		const form = document.getElementById('estacionForm');
		const boton = document.getElementById('btnGuardar');

		// Habilita el botón cuando se detecta un cambio en el formulario
		form.addEventListener('input', function() {
			boton.disabled = false;
		});
	</script>

	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	
		
</body>

</html>