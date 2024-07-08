<?php 

class RecursoModelo extends Modelo{
	
	public function __construct(){
		parent::__construct();
	}
	
	public function select($id_recurso){
		
		$sql = 'SELECT * from recurso where id_recurso=:id_recurso;';
	
		$query = $this->conexion->connect()->prepare($sql);
		
		try{
			$query->execute(['id_recurso'=>$id_recurso]);
			$row = $query->fetch();
        
			if ($row) {
				$recurso = new RecursoBean();
				$recurso->set_id_recurso($id_recurso);
				$recurso->set_numero($row['numero']);
				$recurso->set_url($row['url']);
				$recurso->set_creditos($row['creditos']);
				$recurso->set_id_tipo_recurso($row['id_tipo_recurso']);
				//$recurso->set_tipo_recurso($row['recursos']);
				return $recurso;
			} else {
				return null;
			}
		}
		catch(PDOException $e){
			return null;
		}
	}
	
	public function selectByEstacion($id_estacion){
		$lista = [];
		$sql = 'SELECT recurso.id_recurso,recurso.numero, recurso.url, recurso.creditos, recurso.id_tipo_recurso, tipo_recurso.tipo FROM  estacion
				JOIN estacion_recurso ON estacion.id_estacion = estacion_recurso.id_estacion
				JOIN recurso ON estacion_recurso.id_recurso = recurso.id_recurso
				JOIN tipo_recurso ON recurso.id_tipo_recurso = tipo_recurso.id_tipo_recurso
				where estacion.id_estacion = :id_estacion ORDER BY recurso.numero ASC;';
		
		try{
			$query = $this->conexion->connect()->prepare($sql);
			$query->execute([':id_estacion' => $id_estacion]);

			while($row = $query->fetch()) {

				$recurso = new RecursoBean(
					$row['id_recurso'],
					$row['numero'],
					$row['url'],
					$row['creditos'],
					$row['id_tipo_recurso'],
					$row['tipo']
				);

				array_push($lista, $recurso);
			}
			return $lista;
		}
		catch(PDOException $e) {
			return [];
		}
	}
	
	public function selectTiposRecurso(){
		
		$lista = [];
		$sql = 'SELECT * from tipo_recurso;';
		
		try{
			$query = $this->conexion->connect()->query($sql);

			while($row = $query->fetch()) {

				$recurso = new TipoRecursoBean(
					$row['id_tipo_recurso'],
					$row['tipo']
				);
				array_push($lista, $recurso);
			}
			return $lista;
		}
		catch(PDOException $e) {
			return [];
		}
	}
	
}

?>