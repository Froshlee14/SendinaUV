<?php

class SenderoBean {
    private $id_sendero;
    private $nombre;
    private $sede;
    private $year;
    private $id_zona;
	private $nombre_zona;
    private $url_logo;
	private $url_portada;
	private $status;
	private $num_estaciones;

    // Constructor
    public function __construct(
            $id_sendero = null, 
            $nombre = null, 
            $sede = null, 
            $year = null, 
            $id_zona = null,
			$nombre_zona = null,
            $url_logo = null,
			$url_portada = null,
			$status = null,
			$num_estaciones = null
        ) {
        
        $this->id_sendero = $id_sendero;
        $this->nombre = $nombre;
        $this->sede = $sede;
        $this->year = $year;
        $this->id_zona = $id_zona;
		$this->nombre_zona = $nombre_zona;
        $this->url_logo = $url_logo;
		$this->url_portada = $url_portada;
		$this->status = $status;
		$this->num_estaciones = $num_estaciones;
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

    public function set_url_logo($url_logo) {
        $this->url_logo = $url_logo;
    }
    
    public function get_url_logo() {
        return $this->url_logo;
    }
	
    public function set_url_portada($url_portada) {
        $this->url_portada = $url_portada;
    }
    
    public function get_url_portada() {
        return $this->url_portada;
    }
	
    public function set_status($status) {
        $this->status = $status;
    }
    
    public function get_status() {
        return $this->status;
    }
	
    public function set_num_estaciones($num_estaciones) {
        $this->num_estaciones = $num_estaciones;
    }
    
    public function get_num_estaciones() {
        return $this->num_estaciones;
    }
}

?>