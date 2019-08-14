<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../libs/PHPMailer-master/src/Exception.php';
require '../libs/PHPMailer-master/src/PHPMailer.php';
require '../libs/PHPMailer-master/src/SMTP.php';
require 'database.php';
class registerSend{
	private $db;
	public function __construct(){
		$this->db = new database();
	}

	public function register(){
		preg_replace("/[^a-z \']/i", "", $_POST['register_firstname']);
		preg_replace("/[^a-z \']/i", "", $_POST['register_lastname']);
		preg_replace("/[^a-z \']/i", "", $_POST['register_country']);
		$_POST['language'] = preg_replace("/[^a-z \']/i", "", $_POST['language']);

		try{
			$qr = $this->db->getCon()->prepare("INSERT INTO pre_inscription
				(nome, sobrenome, email, idioma, pais, genero, usuario, senha) VALUES
				(:nome, :sobrenome, :email, :idioma, :pais, :genero, :usuario, :senha)");

			$gender = strtoupper($_POST['register_gender']);
			$pass = hash('sha256', $_POST['register_pass']);
			$qr->bindParam(":nome", $_POST['register_firstname']);
			$qr->bindParam(":sobrenome", $_POST['register_lastname']);
			$qr->bindParam(":email", $_POST['register_email']);
			$qr->bindParam(":idioma", $_POST['language']);
			$qr->bindParam(":pais", $_POST['register_country']);
			$qr->bindParam(":genero", $gender);
			$qr->bindParam(":usuario", $_POST['register_user']);
			$qr->bindParam(":senha", $pass);
			$qr->execute();

			$mail = new PHPMailer(true);
			$mail->CharSet = 'UTF-8';
			$mail->SMTPDebug = 0;
			$mail->isSMTP();
			$mail->Host = 'smtp.sendgrid.net';
			$mail->SMTPAuth = true;
			$mail->Username = 'apikey';
			$mail->Password = '<sendgridKey>';
			$mail->SMTPSecure = 'tls';
			$mail->Port = 587;
			$mail->setFrom('contato@fallingworlds.fun', 'Equipe Falling Worlds');
			$mail->addAddress($_POST['register_email']);
			$mail->isHTML(true);
			$mail->Subject = 'Falling Worlds';

			if(is_file("contents/_{$_POST['language']}/email_register.html"))
				$emailFile = file_get_contents("contents/_{$_POST['language']}/email_register.html");
			else
				$emailFile = file_get_contents("contents/_en/email_register.html");

			$mail->Body = $emailFile;
			$mail->send();

			echo json_encode(array("SUCCESS"=>true, "ID"=>$this->db->getCon()->lastInsertId()));
		}catch(Exception $e){
			echo json_encode($e);
		}
	}
}

$registerSend = new registerSend();
switch($_GET['f']){
	case 'sendReg':
		$registerSend->register();
		break;
}

?>
