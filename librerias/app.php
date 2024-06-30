<?php

require_once 'controladores/errores.php';
	
class App{
	
	function __construct(){
		//echo "<p> Nueva app </p>";

		$url = isset($_GET['url']) ? $_GET['url']: null;
		$url = rtrim($url,'/');
		$url = explode('/',$url);
		
		if(empty($url[0])){
			$archivoControlador = 'controladores/sendero.php';
			require_once $archivoControlador;
			$controlador = new Sendero();
			return false;
		}
		
		$archivoControlador = 'controladores/' . $url[0] . '.php';
		
		if(file_exists($archivoControlador)){
			require_once $archivoControlador;
			$controlador = new $url[0];
			if(isset($url[1])){
				$controlador->{$url[1]}();
			}
		}
		else{
			$controlador = new Errores();
		}
		
	}
}

?>