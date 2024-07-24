<?php

require_once 'entidades/EstacionBean.php';
require_once 'entidades/RecursoBean.php';
require_once 'modelos/recursoModelo.php';

class EstacionControlador extends Controlador{
	
	function __construct(){
		parent::__construct();
		
		session_start();
		//Variables usadas en la vista
		$this->vista->mensaje = "";
		$this->vista->estacion = null;
		$this->vista->recurso_lista = [];
		$this->vista->id_sendero = 0;
		$this->vista->numero = 0;
		
		//Modelos extra
		$this->modeloRecurso = new RecursoModelo();
	}
	
	function renderizar($vista = "estacion/editor"){
		$this->vista->mostrar($vista);
	}
	
	function editar($parametros=null){
		
		$this->verificaUsuario();

		//Obtengo los datos de la estacion
		$id_estacion = $parametros[0];
		$numero = 0;
		if(isset($parametros[1])){
			$numero = $parametros[1];
		}
		$estacion = $this->modelo->select($id_estacion);
		
		//Obtengo la lista de zonas para desplegarlas en un select field
		//$zonas = $this->modelo->selectZonas();
		//Si id_estacion es diferente de 0 tratemos de enviar sus respectivos recursos
		if($id_estacion!=0){
			$recursos = $this->modeloRecurso->selectByEstacion($id_estacion);
			//No importa si la lista esta vacia, eso se comprueba en la vista
			$this->vista->recurso_lista = $recursos;
			
			$_SESSION['id_estacion'] = $id_estacion;
		}
		
		$this->vista->estacion = $estacion;
		$this->vista->numero = $numero;
		$this->renderizar();
	}
	
	function guardar(){
		
		$this->verificaUsuario();
		
		if(
			!isset($_POST['id_estacion']) ||
			!isset($_POST['numero']) ||
			!isset($_POST['nombre']) ||
			!isset($_POST['descripcion']) ||
			!isset($_POST['latitud']) ||
			!isset($_POST['longitud']) 				
			){
			//Hace falta implementar un mejor manejo de los errores
			//Port ahora queda esto
			$this->redir('error');
		}
		
		$id_sendero = $_SESSION['id_sendero'];
        $id_estacion = $_POST['id_estacion'];
        $numero = $_POST['numero'];
        $nombre = $_POST['nombre'];
        $descripcion = $_POST['descripcion'];
        $latitud = $_POST['latitud'];
        $longitud = $_POST['longitud'];

        $estacion = new EstacionBean(
            $id_estacion,
            $numero,
            $nombre,
            $descripcion,
            $latitud,
			$longitud,
            null
        );
        //var_dump($estacion);

        //ASi la id es 0 significa que lo agregamos como nueva estacion
		if($id_estacion==0){
			if($this->modelo->insert($estacion,$id_sendero)){
				$mensaje = "Estacion creada";
			}
			else{
				$mensaje =  "No se pudo crear";
			}	
		}
		//Si no es cero entonces actualizamos la estacion
		else{
			if($this->modelo->update($estacion,$id_sendero)){
				$mensaje = "Estacion actualizada";
			}
			else{
				$mensaje =  "No se pudo actualizar";
			}	
		}
		
		$this->vista->mensaje = $mensaje;
		
		//Debo redirigir a sendero editor
		$url = 'sendero/editar/'.$id_sendero;
		$this->redir($url);
		//mejor uso la funcion de arriba
		//header('Location: '.constant('URL').'sendero/editar/'.$id_sendero);
		//exit();
    }
	
	function borrar($parametros=null){
		
		$this->verificaUsuario();
		
		$id_estacion = $parametros[0]; 
		
		if($this->modelo->deleteBD($id_estacion)){
			$mensaje = "Estacion eliminada";
		}
		else{
			$mensaje =  "No se pudo eliminar";
		}
		$this->vista->mensaje = $mensaje;
		
		$url = 'sendero/editar/'.$_SESSION['id_sendero'];
		$this->redir($url);
	}
	
}
	
?>