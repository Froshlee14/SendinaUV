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
		<p> <?php echo $this->mensaje; ?></p>
	
		<div class="card mb-4">
			<div class="card-header navbar navbar-expand-sm p-4">
				<h3> Detalles de recurso </h3>
			</div>

			<div class="card-body">
				<form action="<?php echo constant('URL') ?>login/autenticar" method="post" id="senderoForm">


					
					<div class="form-group row">
						<div class="col-12 col-sm-3">
							<label for="nombre">Usuario</label>
						</div>
						<div class="col-12 col-sm-9">
							<input class="form-control" type="text" name="nombre" required>
						</div>
					</div>
					
					<div class="form-group row">
						<div class="col-12 col-sm-3">
							<label for="contrasena">Contraseña</label>
						</div>
						<div class="col-12 col-sm-9">
							<input class="form-control" type="text" name="contrasena" required>
						</div>
					</div>

					<div class="float-right">
						<input class="btn btn-primary" type="submit" value="Iniciar sesion">
					</div>
				</form>
			
			</div>

	</div>
	
	<?php  require 'vistas/footer.php' ?>
		
</body>

</html>

</html>