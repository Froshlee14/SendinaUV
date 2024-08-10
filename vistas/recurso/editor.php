<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Sendina - Editor</title>
</head>

<body class="bg-sendina">

	<?php  require 'vistas/navbar.php' ?>

	<?php  require 'vistas/header.php' ?>
	
	<div class="container w-md-75 bg-white p-5 mt-4 mb-4 border-0 rounded">
	
		<!-- <p> <?php echo $this->mensaje; ?></p> -->
		
		<form class="form-card" action="<?php echo constant('URL') ?>recurso/guardar" method="post" id="senderoForm">
		
			<a class="btn btn-secondary mb-3" href="<?php echo constant('URL') ?>estacion/editar/<?php echo $_SESSION['id_estacion']?>"> <i class="bi bi-arrow-bar-left"> </i> Volver </a>
			
			<h3 class="mt-0 mb-4 text-center"> DETALLES DE RECURSO </h3>
		
			<div class="card mb-4">

			
				<?php 
					//var_dump($this->recurso); 
					//require_once 'entidades/SenderoBean.php';
					//var_dump($this->zona_lista);
					
					$id_recurso = 0;
					$numero = $this->numero;
					$url = '';
					$creditos = '';
					$id_tipo_recurso ='';
					
					if($this->recurso !== null){
						$id_recurso = $this->recurso->get_id_recurso();
						$numero = $this->recurso->get_numero();
						$url = $this->recurso->get_url();
						$creditos = $this->recurso->get_creditos();
						$id_tipo_recurso = $this->recurso->get_id_tipo_recurso();
					}
					
				?>

				<div class="card-body bg-light">

					<p>
						<input type="hidden" name="id_recurso" value="<?php echo $id_recurso; ?>" required>
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
								<select id="id_tipo_recurso" name="id_tipo_recurso">
								<?php foreach ($this->tipo_recurso_lista as $tr): ?>
									<option value="<?= $tr->get_id_tipo_recurso() ?>" <?= $tr->get_id_tipo_recurso() == $id_tipo_recurso ? 'selected' : '' ?>>
										<?php echo $tr->get_tipo_recurso(); ?>
									</option>
								<?php endforeach; ?>
								</select>
								<label>Tipo de recurso</label> 
							</div>
						</div>
					
					</div>
					
					<div class="row">
						<div class="col">
							<div class="input-group">
								<input type="text" name="url" placeholder="" value="<?php echo $url ?>" maxlength="500" required> 
								<label>URL del recurso</label> 
							</div>
						</div>
					</div>
					
					<div class="row">
						<div class="col">
							<div class="input-group">
								<input type="text" name="creditos" placeholder="" value="<?php echo $creditos ?>" maxlength="100" required> 
								<label>Créditos</label> 
							</div>
						</div>
					</div>
				
				</div>

			</div>
			
			<!-- No usar input, el css de los input text tambien le afecta -->
			<!-- <input class="btn btn-primary text-light" type="submit" value="Guardar"> -->
			<button class="btn btn-block btn-success text-light mb-3 float-right" type="submit">Guardar cambios</button>
			
			<?php if($this->recurso	 !== null){ ?>
				<button type="button" class="btn-block btn btn-danger text-light" data-toggle="modal" data-target="#exampleModal">
				Borrar estación
				</button>
			<?php } ?>
		
		</form>
	
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
			<a  class=" btn btn-danger text-light" href="<?php echo constant('URL') ?>recurso/borrar/<?php echo $id_recurso ?>"> Borrar</a>
		  </div>
		</div>
	  </div>
	</div>
	
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	
		
</body>

</html>