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

			<div class="card-body">
				<form action="<?php echo constant('URL') ?>recurso/guardar" method="post" id="senderoForm">

					<p>
						<input type="hidden" name="id_recurso" value="<?php echo $id_recurso; ?>" required>
					</p>
					
					<div class="form-group row">
						<div class="col-12 col-sm-3">
							<label for="numero">Numero de recurso</label>
						</div>
						<div class="col-12 col-sm-9">
							<input class="form-control" type="text" name="numero" value="<?php echo $numero ?>" required>
						</div>
					</div>
					
					<div class="form-group row">
						<div class="col-12 col-sm-3">
							<label for="url">Url de recurso</label>
						</div>
						<div class="col-12 col-sm-9">
							<input class="form-control" type="text" name="url" value="<?php echo $url ?>" required>
						</div>
					</div>
					
					<div class="form-group row">
						<div class="col-12 col-sm-3">
							<label for="creditos">Creditos</label>
						</div>
						<div class="col-12 col-sm-9">
							<input class="form-control" type="text" name="creditos" value="<?php echo $creditos ?>" required>
						</div>
					</div>
					
					<div class="form-group row">
						<div class="col-12 col-sm-3">
							<label for="id_tipo_recurso">Tipo de recurso</label>
						</div>
						<div class="col-12 col-sm-9">
							<select class="form-control" id="id_tipo_recurso" name="id_tipo_recurso">
							<?php foreach ($this->tipo_recurso_lista as $tr): ?>
								<option value="<?= $tr->get_id_tipo_recurso() ?>" <?= $tr->get_id_tipo_recurso() == $id_tipo_recurso ? 'selected' : '' ?>>
									<?php echo $tr->get_tipo_recurso(); ?>
								</option>
							<?php endforeach; ?>
							</select>
						</div>
					</div>

					<div class="float-right">
						<input class="btn btn-primary" type="submit" value="Guardar">
						<?php if($this->recurso !== null){ ?>
							<a class="btn btn-danger" href="<?php echo constant('URL') ?>recurso/borrar/<?php echo $id_recurso ?>"> Eliminar</a>
						<?php } ?>
					</div>
				</form>
			
			</div>

	</div>
	
	</div>
	
	<?php  require 'vistas/footer.php' ?>
		
</body>

</html>