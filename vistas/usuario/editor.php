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
	
	<div class="container px-5 mt-3">
	
		<a class="btn btn-secondary mb-3" href="<?php echo constant('URL') ?>usuario/lista"> <i class="bi bi-arrow-bar-left"> </i> Volver </a>
	
		<div class="card mb-4">
			<div class="card-header navbar navbar-expand-sm p-4">
				<h3> Detalles de usuario </h3>
			</div>
		
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
			
			<div class="card-body">
				<form action="<?php echo constant('URL') ?>usuario/guardar" method="post" id="senderoForm">

					<p>
						<!-- <label for="id_usuario">ID usuario</label> -->
						<input type="hidden" name="id_usuario" value="<?php echo $id_usuario; ?>" required>
					</p>
					
					<div class="form-group row">
						<div class="col-12 col-sm-3">
							<label for="nombre">Nombre de usuario</label>
						</div>
						<div class="col-12 col-sm-9">
							<input class="form-control" type="text" name="nombre" value="<?php echo $nombre ?>" required>
						</div>
					</div>
					
					<div class="form-group row">
						<div class="col-12 col-sm-3">
							<label for="contrasena">Contraseña</label>
						</div>
						<div class="col-12 col-sm-9">
							<input class="form-control" type="password" name="contrasena" value="<?php echo $contrasena ?>" required>
						</div>
					</div>

					<div class="form-group row">
						<div class="col-12 col-sm-3">
							<label for="id_rol_usuario">Tipo de usuario</label>
						</div>
						<div class="col-12 col-sm-9">
							<select class="form-control" id="id_rol_usuario" name="id_rol_usuario">
							<?php foreach ($this->rol_usuario_lista as $tu): ?>
								<option value="<?= $tu->get_id_rol_usuario() ?>" <?= $tu->get_id_rol_usuario() == $id_rol_usuario ? 'selected' : '' ?>>
									<?php echo $tu->get_rol_usuario(); ?>
								</option>
							<?php endforeach; ?>
							</select>
						</div>
					</div>
				
					<div class="float-right">
						<input class="btn btn-primary" type="submit" value="Guardar">
						<?php if($this->usuario !== null){ ?>
							<a class="btn btn-danger" href="<?php echo constant('URL') ?>usuario/borrar/<?php echo $id_usuario ?>"> Eliminar</a>
						<?php } ?>
					</div>
				</form>
			</div>
		</div>
		
		<p> <?php echo $this->mensaje; ?></p>

	</div>
	
	<?php  require 'vistas/footer.php' ?>
		
</body>

</html>