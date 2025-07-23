<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require '../vendor/phpmailer/phpmailer/src/Exception.php';
require '../vendor/phpmailer/phpmailer/src/PHPMailer.php';
require '../vendor/phpmailer/phpmailer/src/SMTP.php';

class EmailService {
    public function enviarEmail($email, $senha) {
        
        $mail = new PHPMailer(true);
        try {
            $mail->isSMTP();
            $mail->SMTPAuth = true;
            $mail->Username = 'fabricapasscontrol@gmail.com';  // Seu e-mail do Gmail
            $mail->Password = 'qtcd qeui xmbg eoqy';  // Senha de aplicativo (se a 2FA estiver habilitada)
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;  // Usando TLS
            $mail->Host = 'smtp.gmail.com';
            $mail->Port = 587;
        
            $mail->setFrom('fabricapasscontrol@gmail.com', 'Passcontrol');
            $mail->addAddress($email, 'Fábrica');
            
            $mail->isHTML(true);
            $mail->Subject = 'Recuperação de Senha - Passcontrol';
            $mail->Body = "
                <p>Olá!</p>
                <p>Bem vindo ao PassControl.</p>
                <p>Sua senha gerada pelo sistema é: <b>$senha</b></p>
                <p>Após logar no sistema pela primeira vez, será solicitado que troque sua senha por uma senha forte.</p>
                <p>Se você não solicitou isso, ignore este e-mail.</p>
            ";
            $mail->AltBody = "Olá!\n\nSua senha gerada pelo sistema é: $senha\n\nSe você não solicitou isso, ignore este e-mail.";
            // Envia o e-mail
            $mail->send();
            echo 'A mensagem foi enviada!';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
}

$teste = new EmailService();

