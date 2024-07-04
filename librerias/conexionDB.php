<?php 

class ConexionDB{
	
	private $host;
	private $db;
	private $user;
	private $password;	
	private $charset;
	private $pdo;
	
	public function __construct() {
		$this->host = constant ('HOST');
		$this->db = constant('DB');
		$this->user = constant ('USER');
		$this->password = constant ('PASSWORD');
		$this->charset = constant ('CHARSET');
	}
	
    function connect(){
		if ($this->pdo == null) {
			try{
				$connection = "mysql:host=" . $this->host . ";dbname=" . $this->db . ";charset=" . $this->charset;
				$options = [
					PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
					PDO::ATTR_EMULATE_PREPARES   => false,
				];
				
				$this->pdo = new PDO($connection, $this->user, $this->password, $options);
		
			}catch(PDOException $e){
				print_r('Error connection: ' . $e->getMessage());
			}
		}
		return $this->pdo;
    }

}

?>