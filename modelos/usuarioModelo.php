<?php 

require_once 'entidades/RolUsuarioBean.php';

class UsuarioModelo extends Modelo{
	
	public function __construct(){
		parent::__construct();
	}
	
	public function select($id_usuario){
		
		$sql = 'SELECT usuario.nombre, usuario.contrasena, usuario.id_rol_usuario, rol_usuario.rol_usuario FROM  usuario 
				JOIN rol_usuario ON usuario.id_rol_usuario = rol_usuario.id_rol_usuario WHERE id_usuario = :id_usuario;';
		$query = $this->conexion->connect()->prepare($sql);
		
		try{
			$query->execute(['id_usuario'=>$id_usuario]);
			$row = $query->fetch();
        
			if ($row) {
				$usuario = new UsuarioBean();
				$usuario->set_id_usuario($id_usuario);
				$usuario->set_nombre($row['nombre']);
				$usuario->set_contrasena($row['contrasena']);
				$usuario->set_id_rol_usuario($row['id_rol_usuario']);
				return $usuario;
			} else {
				return null;
			}
		}
		catch(PDOException $e){
			return null;
		}
	}

	public function selectAll(){
		
		$lista = [];
		$sql = 'SELECT usuario.id_usuario, usuario.nombre, usuario.contrasena, usuario.id_rol_usuario, rol_usuario.rol_usuario FROM  usuario
				JOIN rol_usuario ON usuario.id_rol_usuario = rol_usuario.id_rol_usuario ORDER BY rol_usuario.rol_usuario;';
		
		try{
			$query = $this->conexion->connect()->query($sql);

			while($row = $query->fetch()) {

				$usuario = new UsuarioBean(
					$row['id_usuario'],
					$row['nombre'],
					$row['contrasena'],
					$row['id_rol_usuario'],
					$row['rol_usuario']
				);

				array_push($lista, $usuario);
			}
			return $lista;
		}
		catch(PDOException $e) {
			return [];
		}
	}
	
	public function selectRolesUsuario(){
		
		$lista = [];
		$sql = 'SELECT * from rol_usuario;';
		
		try{
			$query = $this->conexion->connect()->query($sql);

			while($row = $query->fetch()) {

				$rol_usuario = new RolUsuarioBean(
					$row['id_rol_usuario'],
					$row['rol_usuario']
				);
				array_push($lista, $rol_usuario);
			}
			return $lista;
		}
		catch(PDOException $e) {
			return [];
		}
	}
	
	public function insert($usuario){
        //Insertar datos de usuario a la BD
		
        $sql = 'INSERT INTO usuario (nombre,contrasena,id_rol_usuario) VALUES (:nombre,:contrasena,:id_rol_usuario);';
        $parametros = [
            'nombre' => $usuario->get_nombre(),
            'contrasena' => $usuario->get_contrasena(),
            'id_rol_usuario' => $usuario->get_id_rol_usuario(),
        ];
        
        try {
			$conexion = $this->conexion->connect();
			
            $query = $conexion->prepare($sql);
            $query->execute($parametros);
			return true;
			
        } catch (PDOException $e) {
            echo $e->getMessage();
			return false;
        }
	}
	
	public function update($usuario){
		//Actualizar datos del usuario en la BD
		//var_dump($usuario);
		
		$sql = 'UPDATE usuario SET  nombre=:nombre, contrasena=:contrasena, id_rol_usuario=:id_rol_usuario where id_usuario=:id_usuario;';
		$parametros = [
            'nombre' => $usuario->get_nombre(),
            'contrasena' => $usuario->get_contrasena(),
            'id_rol_usuario' => $usuario->get_id_rol_usuario(),
			'id_usuario' => $usuario->get_id_usuario(),
        ];
		try {
            $query = $this->conexion->connect()->prepare($sql);
            $query->execute($parametros);
			return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
			return false;
        }
	}
	
	public function deleteBD($id_usuario){
		$sql = 'DELETE FROM usuario WHERE id_usuario=:id_usuario;';
		
		try{
			$query = $this->conexion->connect()->prepare($sql);
			$query->execute(['id_usuario'=>$id_usuario]);
			return true;
		}
		catch(PDOException $e) {
			return false;
		}
		
	}

}