<?php 
require_once('src/PHPMailer.php');
require_once('src/SMTP.php');
require_once('src/Exception.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

function enviarEmail($produto,$mail) {
	$email = new PHPMailer(true);

	try {
		$email->isSMTP();
		$email->Host = 'smtp.gmail.com';
		$email->SMTPAuth = true;
		$email->Username = 'phpestagio123@gmail.com';
		$email->Password = 'phpmysqlphpmysql1';
		$email->Port = 587;

		$email->setFrom('phpestagio123@gmail.com');
		$email->addAddress($mail);

		$email->isHTML(true);
		$email->Subject = "Produto cadastrado!";
		$email->Body = "<h1>Produto cadastrado</h1>" . "<p>O produto ".$produto." foi cadastrado com sucesso</p>";
		$email->AltBody = "produto cadastrado";

		if($email->send()) {
			echo "<br>Email enviado!";
		}
		else {
			echo "Email não enviado!";
		}
	}
	catch(Exception $e) {
		echo "Erro: " . $email->ErrorInfo;
	}
}

?>