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
	
	
	<div id="main">
		<h1>  Usuarios </h1>
		
		<p> <a href="<?php echo constant('URL').'usuario/editar/0'?>"> Agregar usuario </a> </p>
		
		<?php 
			//var_dump($this->usuario_lista); 
			require_once 'entidades/UsuarioBean.php';
			foreach($this->usuario_lista as $item){
				$usuario = new UsuarioBean();
				$usuario = $item;
		?>
			
			<div>
				<p> <?php echo $usuario->get_nombre();  ?> </p>
				<p> <?php echo $usuario->get_rol_usuario(); ?> </p>
				<p> <a href="<?php echo constant('URL') . 'usuario/editar/' . $usuario->get_id_usuario(); ?>"> Editar </a> </p>
				<!-- <p> <a href="<?php echo constant('URL') . 'usuario/eliminar/' . $usuario->get_id_usuario(); ?>"> Borrar </a> </p> -->
			</div>
				
		<?php	
			}
		?>
		<p> <?php echo $this->mensaje; ?></p>

	</div>
	
	<?php  require 'vistas/footer.php' ?>
</body>

</html>