<?php
  class loginManager{
    private $username;
    private $loged = false;
    private $db = null;

    public function __construct(database $database){$this->db = $database;}
    public function doLogin($username, $password){
      if($username != "" || $password != ""){
        try{
    			$qr = $this->db->getCon()->prepare("SELECT * FROM pre_inscription WHERE usuario=:user AND senha=:pass");
    			$pass = hash('sha256', $password);
    			$qr->bindParam(":user", $username);
    			$qr->bindParam(":pass", $pass);
    			$qr->execute();
          var_dump($qr->fetchObject());
          echo "ok";
    			return true;
    		}catch(Exception $e){
          print_r($e);
          echo "no";
    			return false;
    		}
      }
    }
  }

  ?>
