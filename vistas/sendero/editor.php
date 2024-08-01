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
			
				<a class="btn btn-secondary mb-3" href="<?php echo constant('URL') ?>sendero/lista"> <i class="bi bi-arrow-bar-left"></i> Volver </a>
			
				<div class="card mb-4">
				
					<div class="card-header navbar navbar-expand-sm p-4">
						<h3 class="mt-0 mb-4 text-center">Detalles de sendero</h3>
					</div>
					
					<?php 
						//var_dump($this->sendero); 
						//require_once 'entidades/SenderoBean.php';
						//var_dump($this->zona_lista);
						
						$id_sendero = 0;
						$nombre = '';
						$sede = '';
						$year = '';
						$id_zona = 0;
						$url_recursos = '';
						
						if($this->sendero !== null){
							$id_sendero = $this->sendero->get_id_sendero();
							$nombre = $this->sendero->get_nombre();
							$sede = $this->sendero->get_sede();
							$year = $this->sendero->get_year();
							$id_zona = $this->sendero->get_id_zona();
							$url_recursos = $this->sendero->get_url_recursos();
						}
						
					?>
					<div class="card-body form-card">
					<form action="<?php echo constant('URL') ?>sendero/guardar" method="post" id="senderoForm">

						<p>
							<!-- <label for="id_sendero">ID sendero</label> -->
							<input type="hidden" name="id_sendero" value="<?php echo $id_sendero; ?>" required>
						</p>
						
						<div class="form-group row">
							<div class="col-12 col-sm-3">
								<label for="id_sendero">Nombre sendero</label>
							</div>
							<div class="col-12 col-sm-9">
								<input class="form-control" type="text" name="nombre" maxlength="50" value="<?php echo $nombre ?>" required>
							</div>
						</div>
						
						<div class="row">
							<div class="col-12 col-sm-3">
								<div class="input-group"> 
									<input type="number" name="year" placeholder="2024" value="<?php echo $year?>" required> 
									<label>Año de inauguración</label> 
								</div>
							</div>
							<div class="col">
								<div class="input-group"> 
									<input type="text" name="nombre" placeholder="Sendero interpretativo" value="<?php echo $nombre ?>" maxlength="50" required> 
									<label>Nombre de sendero</label> 
								</div>
							</div>
							
						</div>
						
						<div class="row">
							<div class="col-12 col-sm-6">
								<div class="input-group"> 
									<input type="text" name="sede" placeholder="Lugar donde se encuentra" value="<?php echo $sede ?>" maxlength="50" required> 
									<label>Sede</label> 
								</div>
							</div>
							<div class="col-12 col-sm-6">
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
									<input type="text" name="url_recursos" placeholder="/public/imgs/archivo.jpg" value="<?php echo $url_recursos ?>" maxlength="255" required> 
									<label>Ruta de portada</label> 
								</div>
							</div>
						</div>
						
						<div class="form-group row">
							<div class="col-12 col-sm-3">
								<label for="sede">Sede</label>
							</div>
							<div class="col-12 col-sm-9">
								<input class="form-control" type="text" name="sede" maxlength="50" value="<?php echo $sede ?>" required>
							</div>
						</div>
						
						<div class="form-group row">
							<div class="col-12 col-sm-3">
								<label for="year">Año</label>
							</div>
							<div class="col-12 col-sm-9">
								<input class="form-control" type="text" name="year" value="<?php echo $year ?>" required>
							</div>
						</div>
						
						<div class="form-group row">
							<div class="col-12 col-sm-3">
								<label for="id_zona">Zona</label>
							</div>
							<div class="col-12 col-sm-9">
								<select class="form-control" id="id_zona" neame="id_zona">
								<?php foreach ($this->zona_lista as $z): ?>
									<option value="<?= $z->get_id_zona() ?>" <?= $z->get_id_zona() == $id_zona ? 'selected' : '' ?>>
										<?php echo $z->get_nombre(); ?>
									</option>
								<?php endforeach; ?>
								</select>
							</div>
						</div>
						
						<div class="form-group row">
							<div class="col-12 col-sm-3">
								<label for="url_recursos">URL vista previa</label>
							</div>
							<div class="col-12 col-sm-9">
								<input class="form-control" type="text" name="url_recursos" maxlength="255" value="<?php echo $url_recursos ?>" required>
							</div>
						</div>

						<div class="float-right">
							<input class="btn btn-primary" type="submit" value="Guardar">
						
							<?php if($this->sendero !== null){ ?>
								<a  class="btn btn-danger" href="<?php echo constant('URL') ?>sendero/borrar/<?php echo $id_sendero ?>"> Eliminar</a>
							<?php } ?>
						</div>
					</form>
					</div>
				</div>
				
				<p> <?php echo $this->mensaje; ?></p>
				
				<?php if($id_sendero != 0){ ?>
				<div class="card mb-4">
					
					<div class="card-header navbar navbar-expand-sm p-4">
						<h4> Estaciones de sendero </h4>
						<a  class="btn btn-primary ml-auto" href="<?php echo constant('URL').'estacion/editar/0/'.(sizeof($this->estacion_lista)+1)?>"> Nueva estacion </a>
					</div>
					
					<?php
					if(sizeof($this->estacion_lista) > 0){
						//var_dump($this->estacion_lista); 
						foreach ($this->estacion_lista as $estacion):
					?>
					
					<ul class="list-group list-group-flush">
						<li class="list-group-item">
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
				<?php } ?>
					
			</div>
		
			<?php  require 'vistas/footer.php' ?>
		
		</div>
	
	</div>
		
</body>

</html>