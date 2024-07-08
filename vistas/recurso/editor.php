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
		<h1> Detalles de recurso </h1>
		
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
		
		<?php if($this->recurso !== null){ ?>
				<a href="<?php echo constant('URL') ?>estacion/borrar/<?php echo $this->id_sendero ?>/<?php echo $id_estacion ?>"> Eliminar recurso.</a>
			<?php } ?>

        <form action="<?php echo constant('URL') ?>recurso/guardar" method="post" id="senderoForm">

            <p>
                <input type="hidden" name="id_sendero" value="<?php echo $this->id_sendero; ?>" required>
				<input type="hidden" name="id_estacion" value="<?php echo $this->id_estacion; ?>" required>
				<input type="hidden" name="id_recurso" value="<?php echo $id_recurso; ?>" required>
            </p>
			
            <p>
            <label for="numero">Numero de recurso</label>
            <input type="text" name="numero" value="<?php echo $numero ?>" required>
            </p>
            <p>
            <label for="url">Url de recurso</label>
            <input type="text" name="url" value="<?php echo $url ?>" required>
            </p>
            <p>
            <label for="creditos">Creditos</label>
            <input type="text" name="creditos" value="<?php echo $creditos ?>" required>
            </p>

		    <p>
            <label for="id_tipo_recurso">Tipo de recurso</label>
            <select id="id_tipo_recurso" name="id_tipo_recurso">
            <?php foreach ($this->tipo_recurso_lista as $tr): ?>
                <option value="<?= $tr->get_id_tipo_recurso() ?>" <?= $tr->get_id_tipo_recurso() == $id_tipo_recurso ? 'selected' : '' ?>>
                    <?php echo $tr->get_tipo_recurso(); ?>
                </option>
            <?php endforeach; ?>
			</select>
            </p>

            <p>
                <input type="submit" value="Guardar" onclick="prepareSubmit('guardar')">
            </p>
        </form>
		
		<p> <?php echo $this->mensaje; ?></p>

	</div>
	
	<?php  require 'vistas/footer.php' ?>
		
</body>

</html>