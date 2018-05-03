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
          $r = $qr->fetchObject();
          if($r != false){
            $_SESSION['USER'] = array('USER_ID'=>$r->id, 'USERNAME'=>$username, 'LOGED'=>true, 'LOGIN_TIME'=>date('Y-m-d'));
            return true;
          }else{
            return false;
          }
    		}catch(Exception $e){
    			return false;
    		}
      }
    }

    public function doLogout(){
      unset($_SESSION['USER']);
      return true;
    }
  }

  ?>
