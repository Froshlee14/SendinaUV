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
		<h1> Detalles de sendero </h1>
		
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

        <form action="<?php echo constant('URL') ?>sendero/guardar" method="post" id="senderoForm">

            <p>
                <!-- <label for="id_sendero">ID sendero</label> -->
                <input type="hidden" name="id_sendero" value="<?php echo $id_sendero; ?>" required>
            </p>
			
			<?php if($this->sendero !== null){ ?>
				<a href="<?php echo constant('URL') ?>sendero/borrar/<?php echo $id_sendero ?>"> Eliminar sendero.</a>
			<?php } ?>
            
            <p>
            <label for="id_sendero">Nombre sendero</label>
            <input type="text" name="nombre" value="<?php echo $nombre ?>" required>
            </p>
            <p>
            <label for="sede">Sede</label>
            <input type="text" name="sede" value="<?php echo $sede ?>" required>
            </p>
            <p>
            <label for="year">Año</label>
            <input type="text" name="year" value="<?php echo $year ?>" required>
            </p>
			
            <p>
            <label for="id_zona">Zona</label>
            <select id="id_zona" name="id_zona">
            <?php foreach ($this->zona_lista as $z): ?>
                <option value="<?= $z->get_id_zona() ?>" <?= $z->get_id_zona() == $id_zona ? 'selected' : '' ?>>
                    <?php echo $z->get_nombre(); ?>
                </option>
            <?php endforeach; ?>
			</select>
            </p>
            
			<p>
            <label for="url_recursos">URL vista previa</label>
            <input type="text" name="url_recursos" value="<?php echo $url_recursos ?>" required>
            </p>

            <p>
                <input type="submit" value="Guardar" onclick="prepareSubmit('guardar')">
            </p>
        </form>
		
		<p> <?php echo $this->mensaje; ?></p>
		
		<h2> Estaciones de sendero </h2>
		
		<button> <a href="<?php echo constant('URL').'estacion/editar/'.$id_sendero.'/0/'.(sizeof($this->estacion_lista)+1)?>"> Nueva estacion </a> </button>
		
		<?php
		if(sizeof($this->estacion_lista) > 0){
			//var_dump($this->estacion_lista); 
			foreach ($this->estacion_lista as $estacion):
		?>
		
		<div>
			<p>  
				<?php echo $estacion->get_numero(); ?>: <?php echo $estacion->get_nombre(); ?> 
				<a href="<?php echo constant('URL').'estacion/editar/'.$id_sendero.'/'.$estacion->get_id_estacion().'/'.$estacion->get_numero(); ?>"> Editar </a>
				<!-- <a href="<?php echo constant('URL').'estacion/eliminar/'.$estacion->get_id_estacion(); ?>"> Eliminar </a> -->
			</p>
		</div>
		
		<?php
			endforeach;
		}
		else{
			echo "No hay estaciones";
		}
		?>

	</div>
	
	<?php  require 'vistas/footer.php' ?>
		
</body>

</html>