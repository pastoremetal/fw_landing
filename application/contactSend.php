<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../libs/PHPMailer-master/src/Exception.php';
require '../libs/PHPMailer-master/src/PHPMailer.php';
require '../libs/PHPMailer-master/src/SMTP.php';
require 'database.php';
class contactSend{
	private $db;
	public function __construct(){
		$this->db = new database();
	}

	public function sendMessage(){
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
			//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
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
		try{
			$qr = $this->db->getCon()->prepare("INSERT INTO newsletter_inscription (nome, sobrenome, email, idioma) VALUES (:nome, :sobrenome, :email, :idioma)");
			$qr->bindParam(":nome", $nome);
			$qr->bindParam(":sobrenome", $sobrenome);
			$qr->bindParam(":email", $email);
			$qr->bindParam(":idioma", $idioma);
			$qr->execute();
		}catch(Exception $e){
			return $e;
		}
	}
}

$contactSend = new contactSend();
switch($_GET['f']){
	case 'sendMsg':
		$contactSend->sendMessage();
		break;
}

?>
