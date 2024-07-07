<?php 

class RecursoBean{
	
	private $id_recurso;
	private $numero;
	private $url;
	private $creditos;
	private $id_tipo_recurso;
	private $tipo_recurso;
	
    // Constructor
    public function __construct(
            $id_recurso = null, 
            $numero = null, 
            $url = null, 
            $creditos = null, 
            $id_tipo_recurso = null,
			$tipo_recurso = null
        ) {
        
        $this->id_recurso = $id_recurso;
        $this->numero = $numero;
        $this->url = $url;
        $this->creditos = $creditos;
        $this->id_tipo_recurso = $id_tipo_recurso;
		$this->tipo_recurso = $tipo_recurso;
    }
	
    // Setters y Getters
    
    public function set_id_recurso($id_recurso) {
        $this->id_recurso = $id_recurso;
    }

    public function get_id_recurso() {
        return $this->id_recurso;
    }
	
    public function set_numero($numero) {
        $this->numero = $numero;
    }

    public function get_numero() {
        return $this->numero;
    }
	
    public function set_url($url) {
        $this->url = $url;
    }

    public function get_url() {
        return $this->url;
    }
	
    public function set_creditos($creditos) {
        $this->creditos = $creditos;
    }

    public function get_creditos() {
        return $this->creditos;
    }
	
    public function set_id_tipo_recurso($id_tipo_recurso) {
        $this->id_tipo_recurso = $id_tipo_recurso;
    }

    public function get_id_tipo_recurso() {
        return $this->id_tipo_recurso;
    }
	
    public function set_tipo_recurso($tipo_recurso) {
        $this->tipo_recurso = $tipo_recurso;
    }

    public function get_tipo_recurso() {
        return $this->tipo_recurso;
    }

	
}

?>