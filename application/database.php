<?php
class database{
	private $db_host = "localhost";
	private $db_user = "root";
	private $db_pass = "";
	private $db_name = "fw_pre";
	private $con = null;
	
	public function __construct(){
		try{
			$this->con = new PDO('dblib:host={$this->db_host};dbname={$this->db_name};charset=UTF-8', $this->db_user, $this->db_pass);
		}catch(Exception $e){
			return $e;
		}
		return true;
	}
}

?>