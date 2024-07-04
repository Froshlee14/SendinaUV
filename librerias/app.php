<?php

require_once 'controladores/errores.php';
	
class App{
	
	function __construct(){
		//echo "<p> Nueva app </p>";

		//Separo la URL en partes
		$url = isset($_GET['url']) ? $_GET['url']: null;
		$url = rtrim($url,'/');
		$url = explode('/',$url);
		
		echo 'url[0]:'.$url[0];
		//Cuando no se define un controlador en la url
		//cargamos por defecto la vista del inicio
		if(empty($url[0])){
			$archivoControlador = 'controladores/inicioControlador.php';
			require_once $archivoControlador;
			$controlador = new inicioControlador();
			$controlador->renderizar();
			//$controlador->cargarModelo('senderoModelo');
			return false;
		}
		
		//Caso contrario verificamos que existe el controlador
		$archivoControlador = 'controladores/' . $url[0] . 'Controlador.php';
		
		if(file_exists($archivoControlador)){
			require_once $archivoControlador;

            //Cargo el controlador correspondiente
            $nombreControlador = $url[0] . 'Controlador';
            if(class_exists($nombreControlador)){
                $controlador = new $nombreControlador();
    			$controlador->cargarModelo($url[0]);
				
				//Numero de elementos que componen el URL
				$n_param = sizeof($url);
				if($n_param>1){
					if($n_param>2){
						$parametros = [];
						for($i=2; $i<$n_param; $i++){
							array_push($parametros,$url[$i]);
						}
						$controlador->{$url[1]}($parametros);
					}
					else{
						$controlador->{$url[1]}();
					}
				}
				else{
					$controlador->renderizar();
				}
			
				//Si hay un metodo en la url comprobamos si existe
                //if(isset($url[1])){
				//	$controlador->{$url[1]}();
				//echo "vista";
                //}
				//else{
				//	$controlador->renderizar();
				//}
            }
            else{
                //No se encuentra clase de controlador
                $controlador = new Errores();
            }
		}
		else{
            //No se encuentra archivo de controlador
			$controlador = new Errores();
		}
		
	}
}

?>