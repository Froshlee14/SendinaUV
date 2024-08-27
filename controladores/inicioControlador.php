<?php
class inicioControlador extends Controlador{
	
	function __construct(){
		parent::__construct();
		
		session_start();
		//echo "<p> Nuevo sendero controlador </p>";
	}
	
	function index(){
		$this->renderizar();
	}
	
	function renderizar(){
		$this->vista->mostrar("inicio/index");
	}

}

?>