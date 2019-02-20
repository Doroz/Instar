<?php
function sendMail($de,$para,$dados,$assunto)
{
    require_once("vendor/autoload.php");
	$nome = ucwords((strtolower($dados[0])));
	
	$mensagem = "Novo cadastro!" . "<br />" . "<br />" . "Nome: $nome" . "<br />" . "Telefone: $dados[1]" . "<br />" . "Endereço: $dados[2] - $dados[3]" . "<br />" . "<br />" . "Mensagem enviada com os dados: $dados[4]";
    $mail = new PHPMailer;

    $mail->IsSMTP();
    try {
      $mail->SMTPAuth   = true;                 
      $mail->Host       = 'smtp.gmail.com';     
      $mail->SMTPSecure = "tls";                #remova se nao usar gmail
	  $mail->Port       = 587;                  #remova se nao usar gmail
      $mail->Username   = 'rafaeleduardowork@gmail.com'; 
      $mail->Password   = '1666368dpr91';
      $mail->AddAddress($para);
	  $mail->AddReplyTo($de);
      $mail->SetFrom($de);
      $mail->Subject = $assunto;
      $mail->MsgHTML($mensagem);
      $mail->Send();     
      $envio = true;
    } catch (phpmailerException $e) {
      $envio = false;
    } catch (Exception $e) {
      $envio = false;
    }
    return $envio;
}
?>
