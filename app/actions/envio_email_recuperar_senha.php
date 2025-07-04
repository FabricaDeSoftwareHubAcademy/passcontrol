<?php
session_start();

require '../classes/Usuario.php';
require '../../vendor/phpmailer/phpmailer/src/Exception.php';
require '../../vendor/phpmailer/phpmailer/src/PHPMailer.php';
require '../../vendor/phpmailer/phpmailer/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class EmailService {
    public function enviarEmail($email, $codigo) {
        
        $mail = new PHPMailer(true);
        $mail->CharSet = 'UTF-8';

        try {
            $mail->isSMTP();
            $mail->SMTPAuth = true;
            $mail->Username = 'fabricapasscontrol@gmail.com';  // Seu e-mail do Gmail
            // $mail->Password = 'qtcd qeui xmbg eoqy';
            $mail->Password = 'ldqz ewqo mmga rqsx';  // Senha de aplicativo (se a 2FA estiver habilitada)
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
            exit;

        } catch (Exception $e) {
            $response = [
                'status' => 400,
                'message' => "O e-mail não pôde ser enviado. Erro: {$mail->ErrorInfo}"
            ];
            echo json_encode($response);
        }
    }
}


    if (isset($_POST['cpf_user'])) {
        
        $cpf = preg_replace('/[^0-9]/', '', $_POST['cpf_user']);

        $objUser = new Usuario();
        $buscaCPF = 'cpf_usuario = '.$cpf;

        $buscar = $objUser->buscar($buscaCPF);

        if (!$buscar) {
            echo json_encode([
                'status' => 404,
                'message' => 'Usuário não encontrado.'
            ]);
            exit;
        }
        else{

            $id_usuario = $buscar[0]['id_usuario'];
            $email = $buscar[0]['email_usuario'];

            $codigo = rand(10000, 99999);
            $_SESSION['codigo_recuperacao'] = $codigo;
            $_SESSION['id_usuario'] = $id_usuario;
        
            // Envia o e-mail com o código de recuperação
            $emailService = new EmailService();
            $emailService->enviarEmail($email, $codigo);

        }
    
    } else {
        echo json_encode([
            'status' => 400,
            'message' => 'CPF não enviado.'
        ]);
    }