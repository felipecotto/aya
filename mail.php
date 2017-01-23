<?php 

	$GetPost = filter_input_array(INPUT_POST,FILTER_DEFAULT); 

	$Erro = true;
	$name = $GetPost['name'];
	$phone = $GetPost['phone'];
	$email = $GetPost['email'];
	$mensagem = $GetPost['mensagem'];

	include_once "phpmailer/class.smtp.php";
	include_once "phpmailer/class.phpmailer.php";

	$Mailer = new PHPMailer; 
	$Mailer->CharSet = "utf8";
	$Mailer->SMTPDebug = 3;
	$Mailer->IsSMTP();  
	$Mailer->Host ="email-ssl.com.br"; 
	$Mailer->SMTPAuth = true; 
	$Mailer->Username ="contato@ayaprojetos.com";
	$Mailer->Password ="Bradesco01";
	$Mailer->SMTPSecure = "ssl";
	$Mailer->Port = 465 ;
	$Mailer->FromName = "{$name}";
	$Mailer->From = "contato@ayaprojetos.com";
	$Mailer->addAddress("samanta@ayaprojetos.com");
	$Mailer->IsHTML(true);
	$Mailer->Subject = "Contato realizado pelo site - {$name}"." ".date("H:i")." - ".date("d/m/Y");
	$Mailer->Body = "<p><strong>Mensagem enviada por:</strong> {$name} </p> 
					 <p><strong>E-mail:</strong> {$email} </p>
					 <p><strong>Telefone:</strong> {$phone} </p>
					 <p><strong>Mensagem:</strong> {$mensagem} </p>";
	if($Mailer->Send()) {
		$Erro = false;
		}
	
	var_dump($Erro);

 ?>