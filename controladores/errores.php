<?php

require_once 'librerias/controlador.php';

class Errores extends Controlador{
	
	function __construct(){
		parent::__construct();

		//echo "<p> Error al cargar el recurso </p>";
	}
	
	function index(){
		$this->renderizar();
	}
	
	function renderizar(){
		$this->vista->mensaje = "Error al cargar el recurso";
		$this->vista->mostrar("error/index");
	}
}
?>