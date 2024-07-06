<?php

class EstacionBean {
	
	private $id_estacion;
	private $numero;
	private $nombre;
	private $descripcion;
	private $latitud;
	private $longitud;
	private $recursos;
	
	public function __construct(
            $id_estacion = null, 
            $numero = null, 
            $nombre = null, 
            $descripcion = null, 
            $latitud = null,
			$longitud = null,
            $recursos = []
        ) {
	
		$this->id_estacion = $id_estacion;
		$this->numero = $numero;
		$this->nombre = $nombre;
		$this->descripcion = $descripcion;
		$this->latitud = $latitud;
		$this->longitud = $longitud;
		$this->recursos = $recursos;
	}
	
    // Setters y Getters
    
    public function set_id_estacion($id_estacion) {
        $this->id_estacion = $id_estacion;
    }

    public function get_id_estacion() {
        return $this->id_estacion;
    }
	
    public function set_numero($numero) {
        $this->numero = $numero;
    }

    public function get_numero() {
        return $this->numero;
    }
	
    public function set_nombre($nombre) {
        $this->nombre = $nombre;
    }

    public function get_nombre() {
        return $this->nombre;
    }
	
    public function set_descripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    public function get_descripcion() {
        return $this->descripcion;
    }
	
    public function set_latitud($latitud) {
        $this->latitud = $latitud;
    }

    public function get_latitud() {
        return $this->latitud;
    }
	
    public function set_longitud($longitud) {
        $this->longitud = $longitud;
    }

    public function get_longitud() {
        return $this->longitud;
    }
	
    public function set_recursos($recursos) {
        $this->recursos = $recursos;
    }

    public function get_recursos() {
        return $this->recursos;
    }

}

?>