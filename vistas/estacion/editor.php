<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Sendina - Editor</title>
</head>

<body class="bg-primary">

	<?php  require 'vistas/header.php' ?>
	
	<?php  require 'vistas/navbar.php' ?>
	
	<div class="container w-md-75 bg-white p-5 mt-4 mb-4 border-0 rounded">
	
		<form class="form-card" action="<?php echo constant('URL') ?>estacion/guardar" method="post" id="senderoForm">
	
			<a class="btn btn-secondary mb-3" href="<?php echo constant('URL') ?>sendero/editar/<?php echo $_SESSION['id_sendero']?>"> <i class="bi bi-arrow-bar-left"> </i> Volver </a>

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
			<button class="btn btn-block btn-success text-light mb-3 float-right" type="submit">Guardar cambios</button>
			
			<?php if($this->estacion !== null){ ?>
				<button type="button" class="btn-block btn btn-danger text-light" data-toggle="modal" data-target="#exampleModal">
				Borrar estación
				</button>
			<?php } ?>
		
		</form>
		
		<p> <?php echo $this->mensaje; ?></p>
		
	</div>
	
	
	<?php if($id_estacion != 0){ ?>
		
	<div class="container w-md-75 bg-white p-5 mt-4 mb-4 border-0 rounded">
		
		<h5 class="mt-0 mb-4 text-center"> RECURSOS DE ESTACIÓN </h5>
		
		<a class="btn btn-block btn-primary ml-auto mb-3"  href="<?php echo constant('URL').'recurso/editar/0/'.(sizeof($this->recurso_lista)+1)?>"> Nuevo recurso </a>
			
		<div class="card mb-4">
			
			<div class="card-body form-card bg-light">
			
				<?php
				if(sizeof($this->recurso_lista) > 0){
					//var_dump($this->estacion_lista); 
					foreach ($this->recurso_lista as $recurso):
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
					endforeach;
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
		
</body>

</html>