<?php

require_once 'entidades/UsuarioBean.php';

class UsuarioControlador extends Controlador{
	
	function __construct(){
		parent::__construct();
		
		session_start();
		//Variables usadas en la vista
		$this->vista->mensaje = "";
		$this->vista->usuario = null;
		$this->vista->rol_usuario_lista = [];
		
	}
	
	function index(){
		$this->lista();
	}
	
	function renderizar($vista = "usuario/index"){
		$this->vista->mostrar($vista);
	}

	//Funcion para elistar todos los usuarios
	function lista(){
		
		$this->verificaUsuario();
		
		$usuarios = $this->modelo->selectAll();
		$this->vista->usuario_lista = $usuarios;
		$this->renderizar();
	}
	
	//Funcion para guardar/actualizar un registro
    function guardar(){
		
		$this->verificaUsuario();
		
		//var_dump($_POST);
		
		if( !isset($_POST['id_usuario']) ||
			!isset($_POST['nombre']) ||
			!isset($_POST['contrasena']) ||
			!isset($_POST['id_rol_usuario'])	
			){
			//Manejo de los errores
			$this->redir('error');
		}
		
        $id_usuario = $_POST['id_usuario'];
        $nombre = $_POST['nombre'];
        $contrasena = $_POST['contrasena'];
        $id_rol_usuario = $_POST['id_rol_usuario'];
		
		
		
	   // Obtengo datos en caso de que no ingrese nueva contrasena
		if ($id_usuario > 0) {
			$usuarioExistente = $this->modelo->select($id_usuario);
			if ($usuarioExistente === null) {
				$this->vista->mensaje = "Usuario no encontrado.";
				$this->redir('error');
				return;
			}
		}

		// Caso contrario, la ciframos
		if (!empty($contrasena)) {
			//"Heasheo" de contrasena
			$contrasenah = password_hash($contrasena, PASSWORD_DEFAULT);
		} else {
			// Mantener la contraseña existente si no se proporciona una nueva
			if ($id_usuario > 0) {
				$contrasenah = $usuarioExistente->get_contrasena();
			} else {
				$contrasenah = '';
			}
		}
		

        $usuario = new UsuarioBean(
            $id_usuario,
            $nombre,
            $contrasenah,
            $id_rol_usuario
        );
        //var_dump($usuario);

        //Si la id es 0 significa que lo agregamos como nuevo sendero
		if($id_usuario==0){
			if($this->modelo->insert($usuario)){
				$mensaje = "Usuario creado";
			}
			else{
				$mensaje =  "No se pudo crear";
			}	
		}
		//Si no es cero entonces actualizamos el sendero
		else{
			if($this->modelo->update($usuario)){
				$mensaje = "Usuario actualizado";
			}
			else{
				$mensaje =  "No se pudo actualizar";
			}	
		}
		
		$this->vista->mensaje = $mensaje;
		$this->lista();
    }
	
	function editar($parametros=null){
		
		$this->verificaUsuario();
		
		//Obtengo los datos del usuario
		$id_usuario = $parametros[0];
		$usuario = $this->modelo->select($id_usuario);
		
		//Obtengo la lista de tipos de usuario para desplegarlas en un select field
		$roles = $this->modelo->selectRolesUsuario();
		
		$this->vista->usuario = $usuario;
		$this->vista->rol_usuario_lista = $roles;
		$this->renderizar('usuario/editor');
	}
	
	function borrar($parametros=null){
		
		$this->verificaUsuario();
		
		$id_usuario = $parametros[0];
		
		if($id_usuario==1){
			$this->lista();
			return;
		}
		
		if($this->modelo->deleteBD($id_usuario)){
			$mensaje = "Usuario eliminado";
		}
		else{
			$mensaje =  "No se pudo eliminar";
		}
		$this->vista->mensaje = $mensaje;
		$this->lista();
	}
}

?>