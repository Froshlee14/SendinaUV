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
				<h3> Usuarios</h3>
				 <a class="btn btn-primary ml-auto" href="<?php echo constant('URL').'usuario/editar/0'?>"> Agregar usuario </a>
			</div>
			
			<?php 
				//var_dump($this->usuario_lista); 
				require_once 'entidades/UsuarioBean.php';
				foreach($this->usuario_lista as $item){
					$usuario = new UsuarioBean();
					$usuario = $item;
			?>
				
			<ul class="list-group list-group-flush">
				<li class="list-group-item">
					<div>
						<p class="text-dark"> <?php echo $usuario->get_nombre();  ?> </p>
						<p class="text-secondary"> <?php echo $usuario->get_rol_usuario(); ?> </p>
						<a class="btn btn-secondary float-right" href="<?php echo constant('URL') . 'usuario/editar/' . $usuario->get_id_usuario(); ?>"> Editar </a>
						<!-- <p> <a href="<?php echo constant('URL') . 'usuario/eliminar/' . $usuario->get_id_usuario(); ?>"> Borrar </a> </p> -->
					</div>
				</li>
			</ul>
			
			<?php	
				}
			?>
			<p> <?php echo $this->mensaje; ?></p>
		</div>

	</div>
	
	<?php  require 'vistas/footer.php' ?>
</body>

</html>