<?php

require_once 'entidades/RecursoBean.php';
require_once 'entidades/TipoRecursoBean.php';

class RecursoControlador extends Controlador{
	
	function __construct(){
		parent::__construct();
		//Variables usadas en la vista
		$this->vista->mensaje = "";
		$this->vista->recurso = null;
		$this->vista->tipo_recurso_lista = [];
		$this->vista->id_sendero = 0;
		$this->vista->id_estacion = 0;
		$this->vista->numero = 0;
		
		//Modelos extra
		//$this->modeloTipoRecurso = new TipoRecursoModelo();
	}
	
	function renderizar($vista = "recurso/editor"){
		$this->vista->mostrar($vista);
	}

	function editar($parametros=null){

		//Obtengo los datos del recurso
		$id_sendero = $parametros[0];
		$id_estacion = $parametros[1];
		$id_recurso = $parametros[2];
		$numero = $parametros[3];
		$recurso = $this->modelo->select($id_recurso);
		
		//Obtengo la lista de tipos de recurso para desplegarlas en un select field
		$tipos_recurso = $this->modelo->selectTiposRecurso();
		
		$this->vista->id_sendero = $id_sendero;
		$this->vista->id_estacion = $id_estacion;
		$this->vista->recurso = $recurso;
		$this->vista->numero = $numero;
		$this->vista->tipo_recurso_lista = $tipos_recurso;
		$this->renderizar();
	}
}

?>