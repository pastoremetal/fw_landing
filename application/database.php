<?php
class database{
	private $db_host = "127.0.0.1";
	private $db_user = "root";
	private $db_pass = "1478963";
	private $db_name = "falling_worlds_landing";
	private $con = null;

	public function __construct(){
		try{
			$this->con = new PDO("mysql:host={$this->db_host};dbname={$this->db_name};charset=UTF8", $this->db_user, $this->db_pass);
			$this->con ->setAttribute(PDO::ATTR_EMULATE_PREPARES, true);
			$this->con ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}catch(Exception $e){
			//print_r($e);
		}
		return true;
	}

	public function getCon(){return $this->con;}
}

?>
