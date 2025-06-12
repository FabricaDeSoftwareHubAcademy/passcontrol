
<?php

require './vendor/phpmailer/phpmailer/src/PHPMailer.php';
require './vendor/phpmailer/phpmailer/src/SMTP.php';


$mail = new PHPMailer\PHPMailer\PHPMailer();

$email_fabrica = 'fabricadesoftware@gmail.com';


try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.example.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'user@example.com';                     //SMTP username
    $mail->Password   = 'secret';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('from@example.com', 'Mailer');
    $mail->addAddress('joe@example.net', 'Joe User');     //Add a recipient
    $mail->addAddress('ellen@example.com');               //Name is optional
    $mail->addReplyTo('info@example.com', 'Information');
    $mail->addCC('cc@example.com');
    $mail->addBCC('bcc@example.com');

    //Attachments
    $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Primeiro teste de envio de email com PHPMailer';
    $mail->Body    = 'Olá usuário! Esse é </b>';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'vendor/phpmailer/phpmailer/src/Exception.php';
require 'vendor/phpmailer/phpmailer/src/PHPMailer.php';
require 'vendor/phpmailer/phpmailer/src/SMTP.php';

class EmailService {
    public function enviarEmail($email, $codigo) {
        
        $mail = new PHPMailer(true);
        try {
            $mail->isSMTP();
            $mail->SMTPAuth = true;
            $mail->Username = 'gui.m.neves.teste@gmail.com';  // Seu e-mail do Gmail
            $mail->Password = 'elpb yivy xjhx qmgm';  // Senha de aplicativo (se a 2FA estiver habilitada)
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;  // Usando TLS
            $mail->Host = 'smtp.gmail.com';
            $mail->Port = 587;
        
            $mail->setFrom('gui.m.neves.teste@gmail.com', 'Passcontrol');
            $mail->addAddress($email, 'Guilherme');
            
            $mail->isHTML(true);
            $mail->Subject = 'Teste Envio de Email';
            $mail->Body    = "Insira esse código para atualizar a senha! <b>Olá! $codigo</b>";
            $mail->AltBody = "Este é o corpo da mensagem para clientes de e-mail que não reconhecem HTML";
            
            $mail->send();
            echo 'A mensagem foi enviada!';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
}

