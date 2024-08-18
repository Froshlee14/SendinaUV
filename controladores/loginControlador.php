<?php

require_once 'modelos/UsuarioModelo.php';
require_once 'entidades/UsuarioBean.php';

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
		
		session_start();
		
		if(!isset($_SESSION['user_id'])){
			$id_usuario = $this->modeloUsuario->exists($nombre);
			
			if ($id_usuario) {
				$usuario = $this->modeloUsuario->select($id_usuario);
				
				if ($contrasena === $usuario->get_contrasena()) {
					echo "sesion iniciada exitosamente";
					
					//Necesitamos estas datos en sesion
					$_SESSION['user_id'] = $id_usuario;
					$_SESSION['user_rol'] = $usuario->get_rol_usuario();
					
					$this->redir('inicio');
				}
				else{
					$this->vista->mensaje = "Contraseña incorrecta.";
					$this->renderizar();
				}
			}
			
			else{
				$this->vista->mensaje = "No se encontró el usuario.";
				$this->renderizar();
			}
		
		}

		//$this->vista->mensaje = $mensaje;
		//$this->lista();
    }
	
    function salir() {
		session_start();
		session_unset();
		session_destroy();
		$this->redir('login');
	}
	
}

?>