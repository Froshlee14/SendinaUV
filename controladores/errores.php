<?php

require_once 'librerias/controlador.php';

class Errores extends Controlador{
	
	function __construct(){
		parent::__construct();
		$this->vista->mensaje = "Error al cargar el recurso";
		$this->vista->mostrar("error/index");
		//echo "<p> Error al cargar el recurso </p>";
	}
}
?>