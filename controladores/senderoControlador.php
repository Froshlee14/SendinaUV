<?php

require_once 'entidades/SenderoBean.php';
require_once 'entidades/ZonaBean.php';
require_once 'entidades/EstacionBean.php';
require_once 'modelos/estacionModelo.php';

class SenderoControlador extends Controlador{
	
	function __construct(){
		parent::__construct();
		//Variables usadas en la vista
		$this->vista->mensaje = "";
		$this->vista->sendero_lista = [];
		$this->vista->sendero = null;
		$this->vista->zona_lista = [];
		$this->vista->estacion_lista = [];
		
		//Modelos extra
		$this->modeloEstacion = new EstacionModelo();
	}
	
	function renderizar($vista = "sendero/index"){
		$this->vista->mostrar($vista);
	}
	
	//Funcion para elistar todos los senderos
	function lista(){
		$senderos = $this->modelo->selectAll();
		$this->vista->sendero_lista = $senderos;
		$this->renderizar();
	}

	//Funcion para guardar/actualizar un registro
    function guardar(){
        $id_sendero = $_POST['id_sendero'];
        $nombre = $_POST['nombre'];
        $sede = $_POST['sede'];
        $year = $_POST['year'];
        $id_zona = $_POST['id_zona'];
        $url_recursos = $_POST['url_recursos'];

        $sendero = new SenderoBean(
            $id_sendero,
            $nombre,
            $sede,
            $year,
            $id_zona,
			null,
            $url_recursos
        );
        //var_dump($sendero);

        //ASi la id es 0 significa que lo agregamos como nuevo sendero
		if($id_sendero==0){
			if($this->modelo->insert($sendero)){
				$mensaje = "Sendero creado";
			}
			else{
				$mensaje =  "No se pudo crear";
			}	
		}
		//Si no es cero entonces actualizamos el sendero
		else{
			if($this->modelo->update($sendero)){
				$mensaje = "Sendero actualizado";
			}
			else{
				$mensaje =  "No se pudo actualizar";
			}	
		}
		
		$this->vista->mensaje = $mensaje;
		$this->lista();
    }
	
	function editar($parametros=null){

		//Obtengo los datos del sendero
		$id_sendero = $parametros[0];
		$sendero = $this->modelo->select($id_sendero);
		
		//Obtengo la lista de zonas para desplegarlas en un select field
		$zonas = $this->modelo->selectZonas();
		//Si id_sendero es diferente de 0 tratemos de enviar sus respectivas estaciones
		if($id_sendero!=0){
			$estaciones = $this->modeloEstacion->selectBySendero($id_sendero);
			//No importa si la lista esta vacia, eso se comprueba en la vista
			$this->vista->estacion_lista = $estaciones;
		}
		
		$this->vista->sendero = $sendero;
		$this->vista->zona_lista = $zonas;
		$this->renderizar('sendero/editor');
	}
	
	function borrar($parametros=null){
		$id_sendero = $parametros[0];
		
		if($this->modelo->deleteBD($id_sendero)){
			$mensaje = "Sendero eliminado";
		}
		else{
			$mensaje =  "No se pudo eliminar";
		}
		$this->vista->mensaje = $mensaje;
		$this->lista();
	}

}

?>