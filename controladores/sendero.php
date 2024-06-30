<?php
class Sendero extends Controlador{
	
	function __construct(){
		parent::__construct();
		$this->vista->mostrar("sendero/index");
		//echo "<p> Nuevo sendero controlador </p>";
	}
}

?>