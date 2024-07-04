<?php 

class SenderoModelo extends Modelo{
	
	public function __construct(){
		parent::__construct();
	}
	
	public function select($id_sendero){
		
		$sendero = new SenderoBean();
		
		$sql = 'SELECT sendero.id_sendero, sendero.nombre, sendero.sede, sendero.anio_fundacion, sendero.id_zona, zona.nombre as nombre_zona, sendero.url_recursos FROM  zona JOIN zona_sendero ON zona.id_zona = zona_sendero.id_zona JOIN sendero ON zona_sendero.id_sendero = sendero.id_sendero where sendero.id_sendero = :id_sendero;';
		$query = $this->conexion->connect()->prepare($sql);
		
		try{
			$query->execute(['id_sendero'=>$id_sendero]);
			
			while($row = $query->fetch()){
				$sendero->set_id_sendero($id_sendero);
				$sendero->set_nombre($row['nombre']);
				$sendero->set_sede($row['sede']);
				$sendero->set_year($row['anio_fundacion']);
				$sendero->set_id_zona($row['id_zona']);
				$sendero->set_nombre_zona($row['nombre_zona']);
				$sendero->set_url_recursos($row['url_recursos']);
			}
			return $sendero;
		}
		catch(PDOException $e){
			return null;
		}
	}

	public function selectAll(){
		
		$lista = [];
		$sql = 'SELECT sendero.id_sendero, sendero.nombre, sendero.sede, sendero.anio_fundacion, sendero.id_zona, zona.nombre as nombre_zona, sendero.url_recursos FROM  zona JOIN zona_sendero ON zona.id_zona = zona_sendero.id_zona JOIN sendero ON zona_sendero.id_sendero = sendero.id_sendero ;';
		
		try{
			$query = $this->conexion->connect()->query($sql);

			while($row = $query->fetch()) {

				$sendero = new SenderoBean(
					$row['id_sendero'],
					$row['nombre'],
					$row['sede'],
					$row['anio_fundacion'],
					$row['id_zona'],
					$row['nombre_zona'],
					$row['url_recursos']
				);
				//$item->matricula = $row['matricula'];
				//$item->nombre = $row['nombre'];
				//$item->apellido = $row['apellido'];
				array_push($lista, $sendero);
			}
			return $lista;
		}
		catch(PDOException $e) {
			return [];
		}
	}

	public function insert($sendero){
        //Insertar datos de sendero a loa BD
		
        $sql = 'INSERT INTO sendero (nombre,sede,anio_fundacion,id_zona,url_recursos) VALUES (:nombre,:sede,:anio_fundacion,:id_zona,:url_recursos);';
        $parametros = [
            'nombre' => $sendero->get_nombre(),
            'sede' => $sendero->get_sede(),
            'anio_fundacion' => $sendero->get_year(),
            'id_zona' => $sendero->get_id_zona(),
            'url_recursos' => $sendero->get_url_recursos(),
        ];
        
        try {
            $query = $this->conexion->connect()->prepare($sql);
            $query->execute($parametros);
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
		
		$sql = 'UPDATE sendero SET nombre=:nombre, sede=:sede, anio_fundacion=:anio_fundacion, id_zona=:id_zona, url_recursos=:url_recursos where id_sendero=:id_sendero;';
		$parametros = [
            'nombre' => $sendero->get_nombre(),
            'sede' => $sendero->get_sede(),
            'anio_fundacion' => $sendero->get_year(),
            'id_zona' => $sendero->get_id_zona(),
            'url_recursos' => $sendero->get_url_recursos(),
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
}

?>