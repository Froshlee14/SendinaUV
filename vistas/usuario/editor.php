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
		<h1> Detalles de usuario </h1>
		
		<?php 
			//var_dump($this->usuario); 
			//require_once 'entidades/SenderoBean.php';
			//var_dump($this->zona_lista);
			
			$id_usuario = 0;
			$nombre = '';
			$contrasena = '';
			$id_rol_usuario = 1;
			
			if($this->usuario !== null){
				$id_usuario = $this->usuario->get_id_usuario();
				$nombre = $this->usuario->get_nombre();
				$contrasena = $this->usuario->get_contrasena();
				$id_rol_usuario = $this->usuario->get_id_rol_usuario();
			}
			
		?>

        <form action="<?php echo constant('URL') ?>usuario/guardar" method="post" id="senderoForm">

            <p>
                <!-- <label for="id_usuario">ID usuario</label> -->
                <input type="hidden" name="id_usuario" value="<?php echo $id_usuario; ?>" required>
            </p>
			
			<?php if($this->usuario !== null){ ?>
				<a href="<?php echo constant('URL') ?>usuario/borrar/<?php echo $id_usuario ?>"> Eliminar usuario.</a>
			<?php } ?>
            
            <p>
            <label for="nombre">Nombre de usuario</label>
            <input type="text" name="nombre" value="<?php echo $nombre ?>" required>
            </p>

            <p>
            <label for="contrasena">Contraseña</label>
            <input type="password" name="contrasena" value="<?php echo $contrasena ?>" required>
            </p>
		
            <p>
            <label for="id_rol_usuario">Tipo de usuario</label>
            <select id="id_rol_usuario" name="id_rol_usuario">
            <?php foreach ($this->rol_usuario_lista as $tu): ?>
                <option value="<?= $tu->get_id_rol_usuario() ?>" <?= $tu->get_id_rol_usuario() == $id_rol_usuario ? 'selected' : '' ?>>
                    <?php echo $tu->get_rol_usuario(); ?>
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