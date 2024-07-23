<?php

require_once 'modelos/UsuarioModelo.php';

class LoginControlador extends Controlador{
	
	function __construct(){
		parent::__construct();
		//Variables usadas en la vista
		$this->vista->mensaje = "";
		
		//Modelos extra
		$this->modeloUsuario = new UsuarioModelo();
		
	}
	
	function renderizar($vista = "login/index"){
		$this->vista->mostrar($vista);
	}
	
	//Funcion para guardar/actualizar un registro
    function autenticar(){
        $nombre = $_POST['nombre'];
        $contrasena = $_POST['contrasena'];
		
		if(!isset($_SESSION['user_id'])){
			$id_usuario = $this->modeloUsuario->exists($nombre);
			
			if ($id_usuario) {
				$usuario = $this->modeloUsuario->select($id_usuario);
				
				if ($contrasena === $usuario->get_contrasena()) {
					echo "sesion iniciada exitosamente";
					$_SESSION['user_id'] = $id_usuario;
					$_SESSION['user_id'] = $usuario->get_rol_usuario();
				}
				else{
					echo "contraseña incorrecta";
				}
			}
			
			else{
				echo "no se encontro el usuario";
				//imprimo mensaje en la vista
			}
		
		}

		//$this->vista->mensaje = $mensaje;
		//$this->lista();
    }
	
}

?>