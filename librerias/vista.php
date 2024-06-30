<?php

class Vista{
	
	function __construct(){
		//echo "<p> vista base </p>";
		
	}
	
	function mostrar($nombre){
		require 'vistas/' . $nombre . '.php';
	}
}

?>