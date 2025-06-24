<?php
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require '../../vendor/phpmailer/phpmailer/src/Exception.php';
require '../../vendor/phpmailer/phpmailer/src/PHPMailer.php';
require '../../vendor/phpmailer/phpmailer/src/SMTP.php';

class EmailService {
    public function enviarEmail($email, $codigo) {
        
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
            $mail->Body    = "
                <p>Olá!</p>
                <p>Recebemos uma solicitação para redefinir sua senha.</p>
                <p>Seu código de recuperação é: <b>$codigo</b></p>
                <p>Se você não solicitou isso, ignore este e-mail.</p>
            ";
            $mail->AltBody = "Olá!\n\nRecebemos uma solicitação para redefinir sua senha.\n\nSeu código de recuperação é: $codigo\n\nSe você não solicitou isso, ignore este e-mail.";
            // Envia o e-mail
            $mail->send();

            echo json_encode([
                'status' => 200,
                'message' => 'E-mail enviado com sucesso!'
            ]);
        } catch (Exception $e) {
            $response = [
                'status' => 400,
                'message' => "O e-mail não pôde ser enviado. Erro: {$mail->ErrorInfo}"
            ];
            echo json_encode($response);
        }
    }
}


if (isset($_POST['email_user'])) {
    $email = $_POST['email_user'];

    if (empty($email)) {
        echo json_encode([
            'status' => 'empty',
            'message' => 'O campo de e-mail não pode estar vazio.'
        ]);
    } elseif (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Gerar código de 5 dígitos
        $codigo = rand(10000, 99999);

        // Armazenar o código e o e-mail na sessão
        $_SESSION['codigo_recuperacao'] = $codigo;
        $_SESSION['email_recuperacao'] = $email;

        // Chamar a função de envio de e-mail e capturar o retorno
        $emailService = new EmailService();
        $mensagem = $emailService->enviarEmail($email, $codigo);

        exit;

    } else {
        echo json_encode([
            'status' => 400,
            'message' => 'O e-mail informado não é válido.'
        ]);
    }
}

