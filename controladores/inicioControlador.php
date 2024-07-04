<?php
class inicioControlador extends Controlador{
	
	function __construct(){
		parent::__construct();
		
		//echo "<p> Nuevo sendero controlador </p>";
	}
	
	function renderizar(){
		$this->vista->mostrar("inicio/index");
	}

}

?>