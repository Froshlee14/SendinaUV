<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Document</title>

</head>

<body class="bg-primary">

	<?php  require 'vistas/header.php' ?>
	
	<div class="d-flex" id="wrapper">
	
		<?php  require 'vistas/sidebar.php' ?>
		
		
		<div class="container-fluid p-0">
		
			<?php  require 'vistas/navbar.php' ?>
			
			<div class="container w-md-75 bg-white p-5 mt-4 mb-4 border-0 rounded">
			
				
			
			<form action="<?php echo constant('URL') ?>sendero/guardar" method="post" id="senderoForm">
			
				<a class="btn btn-secondary mb-3" href="<?php echo constant('URL') ?>sendero/lista"> <i class="bi bi-arrow-bar-left"></i> Volver </a>
			
				<!-- No usar input, el css de los input text tambien le afecta -->
				<!-- <input class="btn btn-primary text-light" type="submit" value="Guardar"> -->
				<button class="btn btn-primary text-light mb-3 float-right" type="submit">Guardar</button>

			
				<div class="card mb-4">
					
					<?php 
						//var_dump($this->sendero); 
						//require_once 'entidades/SenderoBean.php';
						//var_dump($this->zona_lista);
						
						$id_sendero = 0;
						$nombre = '';
						$sede = '';
						$year = '';
						$id_zona = 0;
						$url_logo = '';
						$url_portada = '';
						$status = 1;
						
						if($this->sendero !== null){
							$id_sendero = $this->sendero->get_id_sendero();
							$nombre = $this->sendero->get_nombre();
							$sede = $this->sendero->get_sede();
							$year = $this->sendero->get_year();
							$id_zona = $this->sendero->get_id_zona();
							$url_logo = $this->sendero->get_url_logo();
							$url_portada = $this->sendero->get_url_portada();
							$status = $this->sendero->get_status();
						}
						
					?>
					<div class="card-body form-card bg-light">
					
					
						<h3 class="mt-0 mb-4 text-center">Detalles de sendero</h3>

						<p>
							<!-- <label for="id_sendero">ID sendero</label> -->
							<input type="hidden" name="id_sendero" value="<?php echo $id_sendero; ?>" required>
						</p>
						
						<div class="row">

							<div class="col">
								<div class="input-group"> 
									<input type="text" name="nombre" placeholder="Sendero interpretativo" value="<?php echo $nombre ?>" maxlength="50" required> 
									<label>Nombre de sendero</label> 
								</div>
							</div>
							
						</div>
						
						<div class="row">
							<div class="col-12">
								<div class="input-group"> 
									<input type="text" name="sede" placeholder="Lugar donde se encuentra" value="<?php echo $sede ?>" maxlength="50" required> 
									<label>Sede</label> 
								</div>
							</div>
						</div>
						
						<div class="row">
							
							<div class="col-12 col-sm-6">
								<div class="input-group"> 
									<input type="number" name="year" placeholder="2024" value="<?php echo $year?>" required> 
									<label>Año</label> 
								</div>
							</div>
							
							<div class="col-12 col-sm-6">
								<div class="input-group">
									<select id="status" name="status">
										<option value="" disabled selected>Select status</option>
										<option value="1" <?= $status == 1 ? 'selected' : '' ?>>Activo</option>
										<option value="0" <?= $status == 0 ? 'selected' : '' ?>>Inactivo</option>
									</select>
									<label>Status</label>
								</div>
							</div>
						
						</div>
						
						<div class="row">
						
							<div class="col-12 ">
								<div class="input-group"> 
									<select id="id_zona" name="id_zona">
										<option value="" disabled selected>Select your option</option>
										<?php foreach ($this->zona_lista as $z): ?>
											<option value="<?= $z->get_id_zona() ?>" <?= $z->get_id_zona() == $id_zona ? 'selected' : '' ?>>
												<?php echo $z->get_nombre(); ?>
											</option>
										<?php endforeach; ?>
									</select>
									<label>Zona</label> 
								</div>
							</div>
						
						</div>

						<div class="row">
							<div class="col-12">
								<div class="input-group"> 
									<input type="text" name="url_logo" placeholder="/public/imgs/logo.jpg" value="<?php echo $url_logo ?>" maxlength="255" required> 
									<label>Ruta de logo</label> 
								</div>
							</div>
						</div>
						
						<div class="row">
							<div class="col-12">
								<div class="input-group"> 
									<input type="text" name="url_portada" placeholder="/public/imgs/portada.jpg" value="<?php echo $url_portada ?>" maxlength="255" required> 
									<label>Ruta de portada</label> 
								</div>
							</div>
						</div>
					
					</div>
				</div>
				
				</form>
				
				<p> <?php echo $this->mensaje; ?></p>
				
				<?php if($id_sendero != 0){ ?>
				<div class="card mb-4">
					
					<div class="card-body form-card bg-light">

						<h4 class=" mb-3 text-center"> Estaciones de sendero </h4>
						<a  class="btn btn-block btn-primary ml-auto mb-3" href="<?php echo constant('URL').'estacion/editar/0/'.(sizeof($this->estacion_lista)+1)?>"> Nueva estacion </a>

						<?php
						if(sizeof($this->estacion_lista) > 0){
							//var_dump($this->estacion_lista); 
							foreach ($this->estacion_lista as $estacion):
						?>
						
						
						<ul class="list-group list-group-flush p-2">
							<li class="list-group-item border">
								<div>
									<?php echo $estacion->get_numero(); ?>: <?php echo $estacion->get_nombre(); ?> 
									<a class="btn btn-secondary float-right" href="<?php echo constant('URL').'estacion/editar/'.$estacion->get_id_estacion().'/'.$estacion->get_numero(); ?>"> Editar </a>
									<!-- <a href="<?php echo constant('URL').'estacion/eliminar/'.$estacion->get_id_estacion(); ?>"> Eliminar </a> -->
								</div>
							</li>
						</ul>
						
						
						<?php
							endforeach;
						}
						else{
							echo "No hay estaciones";
						}
						?>
					
					</div>
				</div>
				<?php } ?>
				
				
						<?php if($this->sendero !== null){ ?>
							<a  class="btn-block btn btn-danger text-light" href="<?php echo constant('URL') ?>sendero/borrar/<?php echo $id_sendero ?>"> Eliminar sendero</a>
						<?php } ?>
					
			</div>
		
			<?php  require 'vistas/footer.php' ?>
		
		</div>
	
	</div>
		
</body>

</html>