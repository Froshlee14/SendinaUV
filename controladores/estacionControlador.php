<?php

require_once 'entidades/EstacionBean.php';
require_once 'entidades/RecursoBean.php';
require_once 'modelos/recursoModelo.php';

class EstacionControlador extends Controlador{
	
	function __construct(){
		parent::__construct();
		//Variables usadas en la vista
		$this->vista->mensaje = "";
		$this->vista->estacion = null;
		$this->vista->recurso_lista = [];
		
		//Modelos extra
		$this->modeloEstacion = new RecursoModelo();
	}
	
	function renderizar($vista = "estacion/editor"){
		$this->vista->mostrar($vista);
	}
	
	function editar($parametros=null){

		//Obtengo los datos del sendero
		$id_estacion = $parametros[0];
		$estacion = $this->modelo->select($id_estacion);
		
		//Obtengo la lista de zonas para desplegarlas en un select field
		//$zonas = $this->modelo->selectZonas();
		//Si id_estacion es diferente de 0 tratemos de enviar sus respectivos recursos
		if($id_estacion!=0){
			$recursos = $this->modeloEstacion->selectByEstacion($id_estacion);
			//No importa si la lista esta vacia, eso se comprueba en la vista
			$this->vista->recurso_lista = $recursos;
		}
		
		$this->vista->estacion = $estacion;
		$this->renderizar();
	}
}
	
?>