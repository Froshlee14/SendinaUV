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
			//var_dump($this->sendero_lista); 
			require_once 'entidades/senderoBean.php';
			
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


        <form action="<?php echo constant('URL') ?>sendero/guardar" method="post">

            <p>
                <label for="id_sendero">ID sendero</label>
                <input type="text" name="id_sendero" value="<?php echo $id_sendero; ?>" required>
            </p>
            
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
            <input type="text" name="id_zona" value="<?php echo $id_zona ?>" required>
            </p>
            <p>
            <label for="url_recursos">URL vista previa</label>
            <input type="text" name="url_recursos" value="<?php echo $url_recursos ?>" required>
            </p>

            <p>
                <input type="submit" value="Guardar">
            </p>
        </form>
		
		<p> <?php echo $this->mensaje; ?></p>

	</div>
	
	<?php  require 'vistas/footer.php' ?>
</body>

</html>