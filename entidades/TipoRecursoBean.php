<?php 

class TipoRecursoBean{
	
	private $id_tipo_recurso;
	private $tipo_recurso;
	
    // Constructor
    public function __construct(
            $id_tipo_recurso = null,
			$tipo_recurso = null
        ) {
        
        $this->id_tipo_recurso = $id_tipo_recurso;
		$this->tipo_recurso = $tipo_recurso;
    }
	
    // Setters y Getters
    
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