<?php

class SenderoBean {
    private $id_sendero;
    private $nombre;
    private $sede;
    private $year;
    private $id_zona;
	private $nombre_zona;
    private $url_recursos;

    // Constructor
    public function __construct(
            $id_sendero = null, 
            $nombre = null, 
            $sede = null, 
            $year = null, 
            $id_zona = null,
			$nombre_zona = null,
            $url_recursos = null
        ) {
        
        $this->id_sendero = $id_sendero;
        $this->nombre = $nombre;
        $this->sede = $sede;
        $this->year = $year;
        $this->id_zona = $id_zona;
		$this->nombre_zona = $nombre_zona;
        $this->url_recursos = $url_recursos;
    }

    // Setters y Getters
    
    public function set_id_sendero($id_sendero) {
        $this->id_sendero = $id_sendero;
    }

    public function get_id_sendero() {
        return $this->id_sendero;
    }

    public function set_nombre($nombre) {
        $this->nombre = $nombre;
    }
    
    public function get_nombre() {
        return $this->nombre;
    }

    public function set_sede($sede) {
        $this->sede = $sede;
    }
    
    public function get_sede() {
        return $this->sede;
    }

    public function set_year($year) {
        $this->year = $year;
    }
    
    public function get_year() {
        return $this->year;
    }

    public function set_id_zona($id_zona) {
        $this->id_zona = $id_zona;
    }
    
    public function get_id_zona() {
        return $this->id_zona;
    }
	
    public function set_nombre_zona($nombre_zona) {
        $this->nombre_zona = $nombre_zona;
    }
    
    public function get_nombre_zona() {
        return $this->nombre_zona;
    }

    public function set_url_recursos($url_recursos) {
        $this->url_recursos = $url_recursos;
    }
    
    public function get_url_recursos() {
        return $this->url_recursos;
    }
}

?>