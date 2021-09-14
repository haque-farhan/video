<?php 
	/**
	* Database class 
	*/
	class DB 
	{
		// assigning the db config values 
		private $dsn ="mysql:host=localhost;dbname=video";
		private $dbUser = DB_USERNAME;
		private $dbPass = DB_PASS;
		private $db;
		private $stmt;
		private $msg;
		
		public function __construct(){
			if (!isset($this->db)) {
				try {
					$con = new PDO($this->dsn, $this->dbUser, $this->dbPass);
					$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					$this->db = $con;
					
				} catch (PDOException $e) {
					die("Connection Failed");
				}
			}
		}

		public function query($query){
		    $this->stmt = $this->db->prepare($query);
		}
		public function bind($param, $value, $type = null){
		    if (is_null($type)) {
		        switch (true) {
		            case is_int($value):
		                $type = PDO::PARAM_INT;
		                break;
		            case is_bool($value):
		                $type = PDO::PARAM_BOOL;
		                break;
		            case is_null($value):
		                $type = PDO::PARAM_NULL;
		                break;
		            default:
		                $type = PDO::PARAM_STR;
		        }
		    }
		    $this->stmt->bindValue($param, $value, $type);
		}
		public function execute(){
			try {
				return $this->stmt->execute();
			} catch (Exception $e) {
				echo $e->getMessage();
			}
		    
		}
	
		public function resultset(){

			try {
				$this->execute();
			    return $this->stmt->fetchAll(PDO::FETCH_OBJ);
			} catch (Exception $e) {
				echo $e->getMessage();
			}   
		}
		public function single(){
			try {
				 $this->execute();
			    return $this->stmt->fetch(PDO::FETCH_OBJ);
			} catch (Exception $e) {
				echo $e->getMessage();
			}
		}
		public function rowCount(){
		    return $this->stmt->rowCount();
		}
		public function lastInsertId(){
		    return $this->db->lastInsertId();
		}

		public function beginTransaction(){
		    return $this->db->beginTransaction();
		}
		public function endTransaction(){
		    return $this->db->commit();
		}
		public function cancelTransaction(){
		    return $this->db->rollBack();
		}

		public function displayMsg($msg,$type,$expr){
			
				return $msg='<div class="flex-center alert '.$type.'">
			            <strong>'.$expr.'!</strong> '.$msg.'
			      </div>';
		}

		









	}




?>