<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Document</title>
</head>

<body>
	<?php  require 'vistas/header.php' ?>
	
	<div class="container px-5 mt-5">
	
		<div class="card mb-4">
			<div class="card-header navbar navbar-expand-sm p-4">
				<h3> Detalles de estación </h3>
			</div>
			
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
			
			<div class="card-body">
				<form action="<?php echo constant('URL') ?>estacion/guardar" method="post" id="senderoForm">

					<p>
						<input type="hidden" name="id_estacion" value="<?php echo $id_estacion; ?>" required>
					</p>
					
					<div class="form-group row">
						<div class="col-12 col-sm-3">
							<label for="numero">Numero de estacion</label>
						</div>
						<div class="col-12 col-sm-9">
							<input class="form-control" type="text" name="numero" value="<?php echo $numero ?>" required>
						</div>
					</div>
					
					<div class="form-group row">
						<div class="col-12 col-sm-3">
							<label for="nombre">Nombre de estacion</label>
						</div>
						<div class="col-12 col-sm-9">
							<input class="form-control" type="text" name="nombre" value="<?php echo $nombre ?>" required>
						</div>
					</div>
					
					<div class="form-group row">
						<div class="col-12 col-sm-3">
							<label for="descripcion">Descripcion</label>
						</div>
						<div class="col-12 col-sm-9">
							<textarea class="form-control" id="textAreaExample2" rows="8" name="descripcion"> <?php echo $descripcion ?></textarea>
							<!-- <input class="form-control" type="text" name="descripcion" value="<?php echo $descripcion ?>" required> -->
						</div>
					</div>

					<div class="form-group row">
						<div class="col-12 col-sm-3">
							<label for="latitud"> Latitud</label>
						</div>
						<div class="col-12 col-sm-9">
							<input class="form-control" type="text" name="latitud" value="<?php echo $latitud ?>" required>
						</div>
					</div>

					<div class="form-group row">
						<div class="col-12 col-sm-3">
							<label for="longitud"> Longitud</label>
						</div>
						<div class="col-12 col-sm-9">
							<input class="form-control" type="text" name="longitud" value="<?php echo $longitud ?>" required>
						</div>
					</div>			
					

					<div class="float-right">
						<input class="btn btn-primary" type="submit" value="Guardar">
						<?php if($this->estacion !== null){ ?>
							<a class="btn btn-danger" href="<?php echo constant('URL') ?>estacion/borrar/<?php echo $id_estacion ?>"> Eliminar</a>
						<?php } ?>
					</div>
				</form>
			</div>

		</div>
		
		<p> <?php echo $this->mensaje; ?></p>
			
		<?php if($id_estacion != 0){ ?>
		<div class="card mb-4">
			
			<div class="card-header navbar navbar-expand-sm p-4">
				<h4> Recursos de la estacion </h4>
				<a class="btn btn-primary ml-auto" href="<?php echo constant('URL').'recurso/editar/0/'.(sizeof($this->recurso_lista)+1)?>"> Nuevo recurso </a>
			</div>
			
			<?php
			if(sizeof($this->recurso_lista) > 0){
				//var_dump($this->estacion_lista); 
				foreach ($this->recurso_lista as $recurso):
			?>
			
			<ul class="list-group list-group-flush">
				<li class="list-group-item">
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
		<?php } ?>

	</div>
	
	<?php  require 'vistas/footer.php' ?>
		
</body>

</html>