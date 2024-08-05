<?php 

class SenderoModelo extends Modelo{
	
	public function __construct(){
		parent::__construct();
	}
	
	public function select($id_sendero){
		
		$sql = 'SELECT sendero.id_sendero, sendero.nombre, sendero.sede, sendero.anio_fundacion, sendero.id_zona, zona.nombre as nombre_zona, sendero.url_logo, sendero.url_portada, sendero.status
			FROM  zona JOIN zona_sendero ON zona.id_zona = zona_sendero.id_zona JOIN sendero ON zona_sendero.id_sendero = sendero.id_sendero where sendero.id_sendero = :id_sendero;';
		$query = $this->conexion->connect()->prepare($sql);
		
		try{
			$query->execute(['id_sendero'=>$id_sendero]);
			$row = $query->fetch();
        
			if ($row) {
				
				$sendero = new SenderoBean(
					$id_sendero,
					$row['nombre'],
					$row['sede'],
					$row['anio_fundacion'],
					$row['id_zona'],
					$row['nombre_zona'],
					$row['url_logo'],
					$row['url_portada'],
					$row['status'],
					null
				);
				return $sendero;
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
		$sql = 'SELECT sendero.id_sendero, sendero.nombre, sendero.sede, sendero.anio_fundacion, sendero.id_zona, zona.nombre as nombre_zona, sendero.url_logo, sendero.url_portada 
			FROM  zona JOIN zona_sendero ON zona.id_zona = zona_sendero.id_zona JOIN sendero ON zona_sendero.id_sendero = sendero.id_sendero ;';
		$sql2 = 'SELECT 
			sendero.id_sendero, sendero.nombre, sendero.sede, sendero.anio_fundacion, sendero.id_zona, 
			zona.nombre AS nombre_zona, sendero.url_logo, sendero.url_portada, sendero.status, COUNT(sendero_estacion.id_estacion) AS num_estaciones
			FROM zona JOIN zona_sendero ON zona.id_zona = zona_sendero.id_zona 
			JOIN sendero ON zona_sendero.id_sendero = sendero.id_sendero
			LEFT JOIN sendero_estacion ON sendero.id_sendero = sendero_estacion.id_sendero
			GROUP BY sendero.id_sendero, sendero.nombre, sendero.sede, sendero.anio_fundacion, sendero.id_zona, zona.nombre, sendero.url_logo;';
		
		try{
			$query = $this->conexion->connect()->query($sql2);

			while($row = $query->fetch()) {

				$sendero = new SenderoBean(
					$row['id_sendero'],
					$row['nombre'],
					$row['sede'],
					$row['anio_fundacion'],
					$row['id_zona'],
					$row['nombre_zona'],
					$row['url_logo'],
					$row['url_portada'],
					$row['status'],
					$row['num_estaciones']
				);

				array_push($lista, $sendero);
			}
			return $lista;
		}
		catch(PDOException $e) {
			return [];
		}
	}
	
	public function selectZonas(){
		
		$lista = [];
		$sql = 'SELECT * from zona;';
		
		try{
			$query = $this->conexion->connect()->query($sql);

			while($row = $query->fetch()) {

				$zona = new ZonaBean(
					$row['id_zona'],
					$row['nombre']
				);
				array_push($lista, $zona);
			}
			return $lista;
		}
		catch(PDOException $e) {
			return [];
		}
	}

	public function insert($sendero){
        //Insertar datos de sendero a loa BD
		
        $sql = 'INSERT INTO sendero (nombre,sede,anio_fundacion,id_zona,url_logo,url_portada,status) VALUES (:nombre,:sede,:anio_fundacion,:id_zona,:url_logo,:url_portada,:status);';
        $parametros = [
            'nombre' => $sendero->get_nombre(),
            'sede' => $sendero->get_sede(),
            'anio_fundacion' => $sendero->get_year(),
            'id_zona' => $sendero->get_id_zona(),
            'url_logo' => $sendero->get_url_logo(),
			'url_portada' => $sendero->get_url_portada(),
			'status' => $sendero->get_status(),
        ];
		
		$sql2 = 'INSERT INTO zona_sendero (id_zona, id_sendero) VALUES (:id_zona,:id_sendero);';
        
        try {
			$conexion = $this->conexion->connect();
			
            $query = $conexion->prepare($sql);
            $query->execute($parametros);
			
			//Obtengo la id del registro creado para usarlo en la proxima query
			$id_sendero = $this->conexion->connect()->lastInsertId();
			
			//Agregamos los datos a la relacion zona-sendero
			$query2 = $conexion->prepare($sql2);
			$parametros = [
				'id_zona' => $sendero->get_id_zona(),
				'id_sendero' => $id_sendero
			];
			
			$query2->execute($parametros);
			return true;
			
        } catch (PDOException $e) {
            echo $e->getMessage();
			return false;
        }
        //var_dump($parametros);
	}
	

	public function update($sendero){
		//Actualizar datos del sendero en la BD
		//var_dump($sendero);
		
		$sql = 'UPDATE sendero SET nombre=:nombre, sede=:sede, anio_fundacion=:anio_fundacion, id_zona=:id_zona, url_logo=:url_logo, url_portada=:url_portada, status=:status where id_sendero=:id_sendero;';
		$parametros = [
            'nombre' => $sendero->get_nombre(),
            'sede' => $sendero->get_sede(),
            'anio_fundacion' => $sendero->get_year(),
            'id_zona' => $sendero->get_id_zona(),
            'url_logo' => $sendero->get_url_logo(),
			'url_portada' => $sendero->get_url_portada(),
			'status' => $sendero->get_status(),
			'id_sendero' => $sendero->get_id_sendero(),
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
	
	public function deleteBD($id_sendero){
		$sql = 'DELETE FROM sendero WHERE id_sendero=:id_sendero;';
		
		try{
			$query = $this->conexion->connect()->prepare($sql);
			$query->execute(['id_sendero'=>$id_sendero]);
			return true;
		}
		catch(PDOException $e) {
			return false;
		}
		
	}
}

?>