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
			$mail->Password = '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';
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


	/*public function sendMessage(){
		$mail = new PHPMailer(true);
		preg_replace("/[^a-z \']/i", "", $_POST['contact_firstname']);
		preg_replace("/[^a-z \']/i", "", $_POST['contact_lastname']);
		//$_POST['contact_email']
		preg_replace("/[^a-z \']/i", "", $_POST['contact_country']);
		preg_replace("/[^0-9]/i", "", $_POST['contact_newsletter']);
		$_POST['contact_message'] = htmlentities($_POST['contact_message']);
		$_POST['language'] = preg_replace("/[^a-z \']/i", "", $_POST['language']);

		if($_POST['contact_firstname']=='' ||
			$_POST['contact_firstname']=='' ||
			$_POST['contact_country']=='' ||
			$_POST['contact_message']=='' |
			$_POST['contact_email']=='' ||
			$_POST['g-recaptcha-response']==''){
				echo json_encode(array("SUCCESS"=>false)); exit;
		}

		$params = array('secret'=>'6LezYlMUAAAAAP2VKKv5cf1vcpWVdcE4gmfCN2PQ', 'response'=>$_POST['g-recaptcha-response']);
		$defaults = array(
			CURLOPT_URL => 'https://www.google.com/recaptcha/api/siteverify',
			CURLOPT_POST => true,
			CURLOPT_POSTFIELDS => $params,
			CURLOPT_RETURNTRANSFER => true
		);
		$ch = curl_init();
		curl_setopt_array($ch, $defaults);
		$ret = json_decode(curl_exec($ch), true);
		if($ret['success']==false){
			echo json_encode(array("SUCCESS"=>false));exit;
		}

		if($_POST['contact_newsletter']==1)
			$this->cadNewsletter($_POST['contact_firstname'], $_POST['contact_lastname'], $_POST['contact_email'], $_POST['contact_country']);

		try {
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
			$mail->addAddress('contato@fallingworlds.fun', 'Equipe Falling Worlds');
			$mail->isHTML(true);
			$mail->Subject = 'Nova mensagem recebida no site';
			$mail->Body = "<html>
							<head>
								<meta charset=\"utf-8\">
							</head>
							<body>
								Uma nova mensagem foi recebida pelo site.<br/>
								<strong>Nome:</strong> {$_POST['contact_firstname']}<br/>
								<strong>Sobrenome:</strong> {$_POST['contact_lastname']}<br/>
								<strong>E-mail:</strong> {$_POST['contact_email']}<br/>
								<strong>País:</strong> {$_POST['contact_country']}<br/>
								<strong>Idioma:</strong> {$_POST['contact_country']}<br/>
								<strong>Newsletter:</strong> {$_POST['contact_newsletter']}<br/>
								<strong>Mensagem:</strong> {$_POST['language']}<br/>
							</body>";

			$mail->send();
			echo json_encode(array("SUCCESS"=>true));
		} catch (Exception $e) {
			echo json_encode(array("SUCCESS"=>false));
		}


	}

	public function cadNewsletter($nome, $sobrenome, $email, $idioma){
		$qr = $this->db->getCon()->prepare("INSERT INTO newsletter_inscription (nome, sobrenome, email, idioma) VALUES (:nome, :sobrenome, :email, :idioma)");
		$qr->bindParam(":nome", $nome);
		$qr->bindParam(":sobrenome", $sobrenome);
		$qr->bindParam(":email", $email);
		$qr->bindParam(":idioma", $idioma);
		$qr->execute();
	}*/
}

$registerSend = new registerSend();
switch($_GET['f']){
	case 'sendReg':
		$registerSend->register();
		break;
}

?>
