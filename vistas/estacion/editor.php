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
		<h1> Detalles de estacion </h1>
		
		<?php 
			//var_dump($this->estacion); 
			//require_once 'entidades/SenderoBean.php';
			//var_dump($this->zona_lista);
			
			$id_estacion = 0;
			$numero = $this->numero;
			$nombre = '';
			$descripcion = '';
			$latitud ='';
			$longitud = '';
			
			if($this->estacion !== null){
				$id_estacion = $this->estacion->get_id_estacion();
				$numero = $this->estacion->get_numero();
				$nombre = $this->estacion->get_nombre();
				$descripcion = $this->estacion->get_descripcion();
				$latitud = $this->estacion->get_latitud();
				$longitud = $this->estacion->get_longitud();
			}
			
		?>
		
		<?php if($this->estacion !== null){ ?>
				<a href="<?php echo constant('URL') ?>estacion/borrar/<?php echo $this->id_sendero ?>/<?php echo $id_estacion ?>"> Eliminar estacion.</a>
			<?php } ?>

        <form action="<?php echo constant('URL') ?>estacion/guardar" method="post" id="senderoForm">

            <p>
                <input type="hidden" name="id_sendero" value="<?php echo $this->id_sendero; ?>" required>
				<input type="hidden" name="id_estacion" value="<?php echo $id_estacion; ?>" required>
            </p>
			
            <p>
            <label for="numero">Numero de estacion</label>
            <input type="text" name="numero" value="<?php echo $numero ?>" required>
            </p>
            <p>
            <label for="nombre">Nombre de estacion</label>
            <input type="text" name="nombre" value="<?php echo $nombre ?>" required>
            </p>
            <p>
            <label for="descripcion">Descripcion</label>
            <input type="text" name="descripcion" value="<?php echo $descripcion ?>" required>
            </p>

			<p>
            <label for="latitud"> Latitud</label>
            <input type="text" name="latitud" value="<?php echo $latitud ?>" required>
            </p>			
            
			<p>
            <label for="longitud"> Longitud</label>
            <input type="text" name="longitud" value="<?php echo $longitud ?>" required>
            </p>

            <p>
                <input type="submit" value="Guardar" onclick="prepareSubmit('guardar')">
            </p>
        </form>
		
		<p> <?php echo $this->mensaje; ?></p>
		
		<h2> Recursos de sendero </h2>
		
		<button> <a href="<?php echo constant('URL').'recurso/editar/'.$this->id_sendero.'/'.$id_estacion.'/0/'.(sizeof($this->recurso_lista)+1)?>"> Nuevo recurso </a> </button>
		
		<?php
		if(sizeof($this->recurso_lista) > 0){
			//var_dump($this->estacion_lista); 
			foreach ($this->recurso_lista as $recurso):
		?>
		
		<div>
		
			<p>  
				<?php echo $recurso->get_numero(); ?>: <?php echo $recurso->get_tipo_recurso(); ?> 
				<a href="<?php echo constant('URL').'recurso/editar/'.$this->id_sendero.'/'.$id_estacion.'/'.$recurso->get_id_recurso().'/'.(sizeof($this->recurso_lista)+1)?>"> Editar </a>
				<!-- <a href="<?php echo constant('URL').'estacion/eliminar/'.$estacion->get_id_estacion(); ?>"> Eliminar </a> -->
			</p>
		
		</div>
		
		<?php
			endforeach;
		}
		else{
			echo "No hay recursos";
		}
		?>

	</div>
	
	<?php  require 'vistas/footer.php' ?>
		
</body>

</html>