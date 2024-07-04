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
		
		<?php 
			//var_dump($this->sendero_lista); 
			require_once 'entidades/SenderoBean.php';
			foreach($this->sendero_lista as $item){
				$sendero = new senderoBean();
				$sendero = $item;
		?>
			
			<div>
				<p> <?php echo $sendero->get_id_sendero(); ?> </p>
				<p> <?php echo $sendero->get_nombre(); ?> </p>
				<p> <?php echo $sendero->get_sede(); ?> </p>
				<p> <a href="<?php echo constant('URL').'sendero/editar/'.$sendero->get_id_sendero(); ?>"> Editar </a> </p>
				<!-- <p> <a href="<?php echo constant('URL').'sendero/eliminar/'.$sendero->get_id_sendero(); ?>"> Borrar </a> </p> -->
			</div>
				
		<?php	
			}
		?>

        <!-- <form action="<?php echo constant('URL') ?>sendero/guardarSendero" method="post"> -->

            <!-- <p> -->
                <!-- <label for="id_sendero">ID sendero</label> -->
                <!-- <input type="text" name="id_sendero" required> -->
            <!-- </p> -->
            
            <!-- <p> -->
            <!-- <label for="id_sendero">Nombre sendero</label> -->
            <!-- <input type="text" name="nombre" required> -->
            <!-- </p> -->
            <!-- <p> -->
            <!-- <label for="id_sendero">Sede</label> -->
            <!-- <input type="text" name="sede" required> -->
            <!-- </p> -->
            <!-- <p> -->
            <!-- <label for="year">Año</label> -->
            <!-- <input type="text" name="year" required> -->
            <!-- </p> -->
            <!-- <p> -->
            <!-- <label for="id_zona">Zona</label> -->
            <!-- <input type="text" name="id_zona" required> -->
            <!-- </p> -->
            <!-- <p> -->
            <!-- <label for="url_recursos">URL vista previa</label> -->
            <!-- <input type="text" name="url_recursos" required> -->
            <!-- </p> -->

            <!-- <p> -->
                <!-- <input type="submit" value="agregar sendero"> -->
            <!-- </p> -->
        <!-- </form> -->
		
		<p> <?php echo $this->mensaje; ?></p>

	</div>
	
	<?php  require 'vistas/footer.php' ?>
</body>

</html>