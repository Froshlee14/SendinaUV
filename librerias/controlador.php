<?php

class Controlador{
	
	function __construct(){
		//echo "<p> controlador base </p>";
		$this->vista = new Vista();
	}
	
	function cargarModelo($modelo){
		$url = 'modelos/'.$modelo.'Modelo.php';
		
		if(file_exists($url)){
			require $url;
			$modeloName = $modelo.'Modelo';
			$this->modelo = new $modeloName();
			
		}
	}
}

?>