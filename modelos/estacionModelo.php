<?php 

class EstacionModelo extends Modelo{
	
	public function __construct(){
		parent::__construct();
	}
	
	public function select($id_estacion){
		
		$sql = 'SELECT * from estacion where id_estacion=:id_estacion;';
	
		$query = $this->conexion->connect()->prepare($sql);
		
		try{
			$query->execute(['id_estacion'=>$id_estacion]);
			$row = $query->fetch();
        
			if ($row) {
				$estacion = new EstacionoBean();
				$estacion->set_id_estacion($id_estacion);
				$estacion->set_numero($row['numero']);
				$estacion->set_nombre($row['nombre']);
				$estacion->set_descripcion($row['descripcion']);
				$estacion->set_latitud($row['latitud']);
				$estacion->set_longitud($row['longitud']);
				//$estacion->set_recursos($row['recursos']);
				return $estacion;
			} else {
				return null;
			}
		}
		catch(PDOException $e){
			return null;
		}
	}
	
	public function selectBySendero($id_sendero){
		
		$lista = [];
		$sql = 'SELECT estacion.id_estacion, estacion.numero, estacion.nombre, estacion.descripcion, estacion.latitud, estacion.longitud FROM  estacion 
				JOIN sendero_estacion ON estacion.id_estacion = sendero_estacion.id_estacion 
				JOIN sendero ON sendero_estacion.id_sendero = sendero.id_sendero 
				where sendero.id_sendero = :id_sendero ORDER BY estacion.numero ASC;';
		
		try{
			$query = $this->conexion->connect()->prepare($sql);
			$query->execute([':id_sendero' => $id_sendero]);

			while($row = $query->fetch()) {

				$sendero = new EstacionBean(
					$row['id_estacion'],
					$row['numero'],
					$row['nombre'],
					$row['descripcion'],
					$row['latitud'],
					$row['longitud'],
					null //$row['recursos']
				);

				array_push($lista, $sendero);
			}
			return $lista;
		}
		catch(PDOException $e) {
			return [];
		}
	}
	
}

?>