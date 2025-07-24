<?php
session_start();

$rootPath = dirname(__DIR__, 2);
loadEnv($rootPath . '/.env');

require_once '../../vendor/phpmailer/phpmailer/src/Exception.php';
require_once '../../vendor/phpmailer/phpmailer/src/PHPMailer.php';
require_once '../../vendor/phpmailer/phpmailer/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class EmailService{

    private string $email_user; // E-mail do Passcontrol
    private string $email_password; // Senha de aplicativo (se a 2FA estiver habilitada)
    private array $msg_sucesso;

    private array $msg_erro;

    public function __construct()
    {
        $this->email_user = getenv('EMAIL_USERNAME');
        $this->email_password = getenv('EMAIL_PASSWORD');
        $this->msg_sucesso = [
        'status' => 200,
        'message' => 'E-mail enviado com sucesso!'
        ];
        $this->msg_erro = [
        'status' => 400,
        'message' => "O e-mail não pôde ser enviado."
        ];
    }

    public function enviar_email_recuperacao($email, $codigo){

        $mail = new PHPMailer(true);
        $mail->CharSet = 'UTF-8';

        try {
            $mail->isSMTP();
            $mail->SMTPAuth = true;
            $mail->Username = $this->email_user;
            $mail->Password = $this->email_password;
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Host = 'smtp.gmail.com';
            $mail->Port = 587;

            $mail->setFrom($this->email_user, 'Passcontrol');
            $mail->addAddress($email, 'Usuário');

            $mail->isHTML(true);
            $mail->Subject = 'Recuperação de Senha - Passcontrol';
            $mail->Body = "
                <p>Olá!</p>
                <p>Recebemos uma solicitação para redefinir sua senha.</p>
                <p>Seu código de recuperação é: <b>$codigo</b></p>
                <p>Se você não solicitou isso, ignore este e-mail.</p>
            ";
            $mail->AltBody = "Olá!\n\nRecebemos uma solicitação para redefinir sua senha.\n\nSeu código de recuperação é: $codigo\n\nSe você não solicitou isso, ignore este e-mail.";
            // Envia o e-mail
            $mail->send();

            echo json_encode($this->msg_sucesso);
            exit;
        } catch (Exception $e) {
            echo json_encode($this->msg_erro);
        }
    }

    public function enviar_email_cadastro($email, $senha){

        $mail = new PHPMailer(true);
        try {
            $mail->isSMTP();
            $mail->SMTPAuth = true;
            $mail->Username = $this->email_user;  
            $mail->Password = $this->email_password;
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Host = 'smtp.gmail.com';
            $mail->Port = 587;

            $mail->setFrom($this->email_user, 'Passcontrol');
            $mail->addAddress($email, 'Fábrica');

            $mail->isHTML(true);
            $mail->Subject = 'Novo Usuario - Passcontrol';
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
            echo json_encode($this->msg_sucesso);
            exit;
        } catch (Exception $e) {
            echo json_encode($this->msg_erro);
        }
    }
}
