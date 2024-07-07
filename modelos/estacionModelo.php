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
				$estacion = new EstacionBean();
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
	
	public function insert($estacion,$id_sendero){
        //Insertar datos de sendero a loa BD
		
        $sql = 'INSERT INTO estacion (numero, nombre, descripcion,latitud,longitud) VALUES (:numero,:nombre,:descripcion,:latitud,:longitud);';
        $parametros = [
            'numero' => $estacion->get_numero(),
            'nombre' => $estacion->get_nombre(),
            'descripcion' => $estacion->get_descripcion(),
            'latitud' => $estacion->get_latitud(),
            'longitud' => $estacion->get_longitud(),
        ];
		
		$sql2 = 'INSERT INTO sendero_estacion (id_sendero, id_estacion) VALUES (:id_sendero,:id_estacion);';
        
        try {
			$conexion = $this->conexion->connect();
			
            $query = $conexion->prepare($sql);
            $query->execute($parametros);
			
			//Obtengo la id del registro creado para usarlo en la proxima query
			$id_estacion = $this->conexion->connect()->lastInsertId();

			
			//Agregamos los datos a la relacion zona-sendero
			$query2 = $conexion->prepare($sql2);
			$parametros = [
				'id_sendero' => $id_sendero,
				'id_estacion' => $id_estacion
			];
			
			$query2->execute($parametros);
			return true;
			
        } catch (PDOException $e) {
            echo $e->getMessage();
			return false;
        }
        //var_dump($parametros);
	}
	
	public function update($estacion){
		//Actualizar datos de la estacion en la BD
		//var_dump($estacion);
		
		$sql = 'UPDATE estacion SET numero=:numero, nombre=:nombre, descripcion=:descripcion, latitud=:latitud, longitud=:longitud where id_estacion=:id_estacion;';
		$parametros = [
            'numero' => $estacion->get_numero(),
            'nombre' => $estacion->get_nombre(),
            'descripcion' => $estacion->get_descripcion(),
            'latitud' => $estacion->get_latitud(),
            'longitud' => $estacion->get_longitud(),
			'id_estacion' => $estacion->get_id_estacion(),
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
	
	public function deleteBD($id_estacion){
		$sql = 'DELETE FROM estacion WHERE id_estacion=:id_estacion;';
		
		try{
			$query = $this->conexion->connect()->prepare($sql);
			$query->execute(['id_estacion'=>$id_estacion]);
			return true;
		}
		catch(PDOException $e) {
			return false;
		}
		
	}
	
}

?>