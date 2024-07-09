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
	
	
	<div class="container mt-4 mb-4">
	
		<div  class="d-flex pb-4">
			<h3>  Senderos Interpretativos </h3>
			<a class="btn btn-primary ml-auto" href="<?php echo constant('URL').'sendero/editar/0'?>"> Agregar sendero </a>
		</div>
		
		<div class="row">
			<?php 
				//var_dump($this->sendero_lista); 
				require_once 'entidades/SenderoBean.php';
				foreach($this->sendero_lista as $item){
					$sendero = new senderoBean();
					$sendero = $item;
			?>
			<div class="col-sm-4 pb-4">
	
				<div class="card rounded clearfix ">
					<img  src="<?php  echo constant('URL') . '/public/imgs/'. $sendero->get_url_recursos(); ?>" style="width: 100%; aspect-ratio: 1/1;">
					
					<div class="card-body bg-light text-center">
						<h5 class="text-primary"> <?php echo $sendero->get_nombre();  ?> </h5>
						<p class="text-secondary"> <?php echo $sendero->get_sede(); ?> </p> 
						
						<a class="btn btn-primary" href="<?php echo constant('URL') . 'sendero/ver/' . $sendero->get_id_sendero(); ?>"> Ver Sendero </a>
						<a class="btn btn-secondary" href="<?php echo constant('URL') . 'sendero/editar/' . $sendero->get_id_sendero(); ?>"> Editar </a> 
						<!-- <p> <a href="<?php echo constant('URL') . 'sendero/eliminar/' . $sendero->get_id_sendero(); ?>"> Borrar </a> </p> -->
					</div>
			
				</div>
			</div>	
			<?php	
				}
			?>
		</div>
		<p> <?php echo $this->mensaje; ?></p>

	</div>
	
	<?php  require 'vistas/footer.php' ?>
</body>

</html>