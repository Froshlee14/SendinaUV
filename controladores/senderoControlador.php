<?php

require_once 'entidades/SenderoBean.php';
require_once 'entidades/ZonaBean.php';

class SenderoControlador extends Controlador{
	
	function __construct(){
		parent::__construct();
		$this->vista->mensaje = "";
		$this->vista->sendero_lista = [];
		$this->vista->sendero = null;
		$this->vista->zona_lista = [];
		//echo "<p> Nuevo sendero controlador </p>";
	}
	
	function renderizar($vista = "sendero/index"){
		$this->vista->mostrar($vista);
	}
	
	//Funcion para elistar todos los senderos
	function enlistar(){
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
		$this->enlistar();
    }
	
	function editar($parametros=null){
		//var_dump($parametros);
		$id_sendero = $parametros[0];
		$sendero = $this->modelo->select($id_sendero);
		//Tambien obtengo la lista de zonas para desplegarlas en un select field
		$zonas = $this->modelo->selectZonas();
		
		$this->vista->sendero = $sendero;
		$this->vista->zona_lista = $zonas;
		$this->renderizar('sendero/editor');
	}

}

?>