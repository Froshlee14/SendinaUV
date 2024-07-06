<?php 

class EstacionModelo extends Modelo{
	
	public function __construct(){
		parent::__construct();
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