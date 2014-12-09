<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require 'class.phpmailer.php';


if(!function_exists('enviar_email')){
	function enviar_email($dest ,$assunto, $conteudo){
		$mail = new PHPMailer(true);
				
		$mail->IsSMTP();    // set mailer to use SMTP
		$mail->Host = "smtp.live.com";    // specify main and backup server
		$mail->SMTPAuth = true;    // turn on SMTP authentication
		$mail->Username = "luks_lukete@hotmail.com";    // SMTP username -- CHANGE --
		$mail->Password = "keporra157";    // SMTP password -- CHANGE --
		$mail->SMTPSecure = "tls";  
		$mail->Port = "587";    // SMTP Port
		$mail->SMTPAuth   = true;


		/*$mail->Username   = "agropecuariatrabalhogic@gmail.com";
		$mail->Password   = "Cotemig123456"; */
		$mail->SetFrom('noreplay@pegapramim.com', 'Sistema PegaPraMim');
		
		//Adiciona o destinatário
		$mail->AddAddress($dest);
		//Adiciona o assunto
		$mail->Subject = $assunto;
		//Conteúdo do e-mail
		$mail->MsgHTML($conteudo);
		
		if(@!$mail->Send()){
			#echo "Erro ao enviar email: <pre>" ; print_r($mail->ErrorInfo); echo "</pre>";
		}
		
		else{
		#	echo "E-mail enviado!";
		}
	}
}