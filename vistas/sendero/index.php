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
		<h1>  Senderos </h1>
		
		<p> <a href="<?php echo constant('URL').'sendero/editar/0'?>"> Agregar sendero </a> </p>
		
		<?php 
			//var_dump($this->sendero_lista); 
			require_once 'entidades/SenderoBean.php';
			foreach($this->sendero_lista as $item){
				$sendero = new senderoBean();
				$sendero = $item;
		?>
			
			<div>
				<p> <?php echo $sendero->get_id_sendero() . ': ' . $sendero->get_nombre();  ?> </p>
				<p> <?php echo $sendero->get_sede(); ?> </p>
				<p> <a href="<?php echo constant('URL').'sendero/editar/'.$sendero->get_id_sendero(); ?>"> Editar </a> </p>
				<!-- <p> <a href="<?php echo constant('URL').'sendero/eliminar/'.$sendero->get_id_sendero(); ?>"> Borrar </a> </p> -->
			</div>
				
		<?php	
			}
		?>
		<p> <?php echo $this->mensaje; ?></p>

	</div>
	
	<?php  require 'vistas/footer.php' ?>
</body>

</html>