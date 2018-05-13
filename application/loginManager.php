<?php
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\Exception;

  require 'libs/PHPMailer-master/src/Exception.php';
  require 'libs/PHPMailer-master/src/PHPMailer.php';
  require 'libs/PHPMailer-master/src/SMTP.php';

  class loginManager{
    private $username;
    private $loged = false;
    private $db = null;

    public function __construct(database $database){$this->db = $database;}
    public function doLogin($username, $password){
      if($username != "" && $password != ""){
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
    			$qr = $this->db->getCon()->prepare("SELECT * FROM pre_inscription WHERE usuario=:user OR email=:user");
    			$qr->bindParam(":user", $email);
    			$qr->execute();
          $r = $qr->fetchObject();
          if($r != false){
            $iq = $this->db->getCon()->prepare("UPDATE pre_inscription SET forgetpass_hash=:hash WHERE id=:id");
            $hash = hash('sha256', time().$email.rand(100000, 999999));
            $iq->bindParam(":hash", $hash);
            $iq->bindParam(":id", $r->id);
            $iq->execute();
            if(is_file("application/contents/_{$_SESSION['language']}/email_forgot_password.html"))
      				$emailFile = file_get_contents("application/contents/_{$_SESSION['language']}/email_forgot_password.html");
      			else
      				$emailFile = file_get_contents("application/contents/_en/email_forgot_password.html");
              $terms = array('nome'=>$r->nome, 'user'=>$r->usuario, 'lan'=>$_SESSION['language'], 'hash'=>$hash);
              $match = array();
              preg_match_all("/<\?[a-z_]*\?>/", $emailFile, $match);
              foreach($match[0] as $k=>$val){
                $nK = str_replace(array('<?', '?>'), '', $val);
                if(array_key_exists($nK, $terms))
                  $emailFile = str_replace($val, $terms[$nK], $emailFile);
              }
              $mail = new PHPMailer(true);
              $mail->CharSet = 'UTF-8';
        			$mail->SMTPDebug = 0;
        			$mail->isSMTP();
        			$mail->Host = 'smtp.sendgrid.net';
        			$mail->SMTPAuth = true;
        			$mail->Username = 'apikey';
        			$mail->Password = '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';
        			$mail->SMTPSecure = 'tls';
        			$mail->Port = 587;
        			$mail->setFrom('contato@fallingworlds.fun', 'Equipe Falling Worlds');
        			$mail->addAddress($r->email, "{$r->nome} {$r->sobrenome}");
        			$mail->isHTML(true);
        			$mail->Subject = 'Recuperação de senha';
        			$mail->Body = $emailFile;
        			$mail->send();
            return true;
          }else
            return false;
    		}catch(Exception $e){
    			return false;
    		}
      }
    }

    public function getUserByForgetpassHash($hash){
      if($hash != ""){
        try{
    			$qr = $this->db->getCon()->prepare("SELECT * FROM pre_inscription WHERE forgetpass_hash=:hash");
    			$qr->bindParam(":hash", $hash);
    			$qr->execute();
          $r = $qr->fetchObject();
          if($r != false){
            return $r;
          }else
            return false;
    		}catch(Exception $e){
    			return false;
    		}
      }
    }

    public function resetPassword($usrId, $hs, $password){
      if($usrId !="" && $hs != "" && $password != ""){
        try{
    			$qr = $this->db->getCon()->prepare("UPDATE pre_inscription SET senha=:password, forgetpass_hash=NULL WHERE id=:id AND forgetpass_hash=:hs");
    			$pass = hash('sha256', $password);
          $qr->bindParam(":id", $usrId);
          $qr->bindParam(":hs", $hs);
    			$qr->bindParam(":password", $pass);
    			$qr->execute();
            return true;
    		}catch(Exception $e){
    			return false;
    		}
      }
    }
  }

  ?>
