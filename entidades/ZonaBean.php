<?php

class zonaBean{
	private $id_zona;
	private $nombre;
	
	public function __construct(
			$id_zona = null,
			$nombre = null
		) {
		
		$this->id_zona = $id_zona;
		$this->nombre = $nombre;
	}
	
	public function set_id_zona($id_zona) {
        $this->id_zona = $id_zona;
    }

    public function get_id_zona() {
        return $this->id_zona;
    }
	
	public function set_nombre($nombre) {
        $this->nombre = $nombre;
    }

    public function get_nombre() {
        return $this->nombre;
    }
}

?>