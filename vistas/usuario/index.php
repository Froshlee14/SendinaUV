<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Sendina - Usuarios</title>
</head>

<body class="bg-primary">

	<?php  require 'vistas/header.php' ?>
			
	<?php  require 'vistas/navbar.php' ?>
	
	<div class="container w-md-75 bg-white p-5 mt-4 mb-4 border-0 rounded">
	
		<h5 class=" mb-3 text-center"> USUARIOS </h5>
		<a  class="btn btn-block btn-primary ml-auto mb-3" href="<?php echo constant('URL').'usuario/editar/0'?>"> Agregar usuario </a>
	
		<div class="card mb-4">
			
			<div class="card-body form-card bg-light">
			<?php 
				//var_dump($this->usuario_lista); 
				require_once 'entidades/UsuarioBean.php';
				foreach($this->usuario_lista as $item){
					$usuario = new UsuarioBean();
					$usuario = $item;
			?>
				
			<ul class="list-group list-group-flush p-2">
				<li class="list-group-item border">
					<div>
						<?php echo $usuario->get_nombre();?>
						<span class="badge badge-primary"><?php echo $usuario->get_rol_usuario(); ?></span>
						<a class="btn btn-secondary float-right" href="<?php echo constant('URL') . 'usuario/editar/' . $usuario->get_id_usuario(); ?>"> Editar </a>
						<!-- <p> <a href="<?php echo constant('URL') . 'usuario/eliminar/' . $usuario->get_id_usuario(); ?>"> Borrar </a> </p> -->
					</div>
				</li>
			</ul>
			
			<?php	
				}
			?>
			</div>
		</div>
		
		<p> <?php echo $this->mensaje; ?></p>

	</div>
	
	<?php  require 'vistas/footer.php' ?>
</body>

</html>