<?php

class UsuarioBean {
    private $id_usuario;
    private $nombre;
    private $contrasena;
    private $id_rol_usuario;
    private $rol_usuario;

    // Constructor
    public function __construct(
            $id_usuario = null, 
            $nombre = null, 
            $contrasena = null, 
            $id_rol_usuario = null, 
            $rol_usuario = null
        ) {
        
        $this->id_usuario = $id_usuario;
        $this->nombre = $nombre;
        $this->contrasena = $contrasena;
        $this->id_rol_usuario = $id_rol_usuario;
        $this->rol_usuario = $rol_usuario;
    }
	
  // Setters y Getters
    
    public function set_id_usuario($id_usuario) {
        $this->id_usuario = $id_usuario;
    }

    public function get_id_usuario() {
        return $this->id_usuario;
    }
	
    public function set_nombre($nombre) {
        $this->nombre = $nombre;
    }

    public function get_nombre() {
        return $this->nombre;
    }
	
    public function set_contrasena($contrasena) {
        $this->contrasena = $contrasena;
    }

    public function get_contrasena() {
        return $this->contrasena;
    }
	
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