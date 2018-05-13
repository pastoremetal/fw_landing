<?php
  class loginManager{
    private $username;
    private $loged = false;
    private $db = null;

    public function __construct(database $database){$this->db = $database;}
    public function doLogin($username, $password){
      if($username != "" || $password != ""){
        try{
    			$qr = $this->db->getCon()->prepare("SELECT * FROM pre_inscription WHERE (usuario=:user OR email=:user) AND senha=:pass");
    			$pass = hash('sha256', $password);
    			$qr->bindParam(":user", $username);
    			$qr->bindParam(":pass", $pass);
    			$qr->execute();
          $r = $qr->fetchObject();
          if($r != false){
            $_SESSION['USER'] = array('USER_ID'=>$r->id, 'USERNAME'=>$username, 'LOGED'=>true, 'LOGIN_TIME'=>date('Y-m-d'));
            return true;
          }else
            return false;

    		}catch(Exception $e){
    			return false;
    		}
      }
    }

    public function doLogout(){
      unset($_SESSION['USER']);
      return true;
    }

    public function requestNewPass($email){
      if($email != ""){
        try{
    			$qr = $this->db->getCon()->prepare("SELECT * FROM pre_inscription WHERE email=:user");
    			$qr->bindParam(":user", $email);
    			$qr->execute();
          $r = $qr->fetchObject();
          if($r != false){
            $iq = $this->db->getCon()->prepare("UPDATE pre_inscription SET forgetpass_hash=:hash WHERE id=:id");
            $hash = hash('sha256', time().$email.rand(100000, 999999));
            $iq->bindParam(":hash", $hash);
            $iq->bindParam(":id", $r->id);
            $iq->execute();

            if(is_file("contents/_{$_POST['language']}/email_register.html"))
      				$emailFile = file_get_contents("contents/_{$_POST['language']}/email_register.html");
      			else
      				$emailFile = "contents/_en/email_register.html";

            return true;
          }else
            return false;

    		}catch(Exception $e){
    			return false;
    		}
      }
    }

  }

  ?>
