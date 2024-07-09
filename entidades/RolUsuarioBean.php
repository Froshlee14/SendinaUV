<?php 

class RolUsuarioBean{
	
	private $id_rol_usuario;
	private $rol_usuario;
	
    // Constructor
    public function __construct(
            $id_rol_usuario = null,
			$rol_usuario = null
        ) {
        
        $this->id_rol_usuario = $id_rol_usuario;
		$this->rol_usuario = $rol_usuario;
    }
	
    // Setters y Getters
    
    public function set_id_rol_usuario($id_rol_usuario) {
        $this->id_rol_usuario = $id_rol_usuario;
    }

    public function get_id_rol_usuario() {
        return $this->id_rol_usuario;
    }
	
    public function set_rol_usuario($rol_usuario) {
        $this->rol_usuario = $rol_usuario;
    }

    public function get_rol_usuario() {
        return $this->rol_usuario;
    }
}

?>