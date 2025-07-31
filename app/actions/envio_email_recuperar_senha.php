<?php
require_once '../classes/Usuario.php';
require_once '../classes/PHPMailer.php';

if (isset($_POST['cpf_user'])) {

    $cpf = preg_replace('/[^0-9]/', '', $_POST['cpf_user']);

    $objUser = new Usuario();
    $cpf = filter_var($cpf, FILTER_SANITIZE_SPECIAL_CHARS);
    $buscaCPF = 'cpf_usuario = ' . $cpf;

    $buscar = $objUser->buscar($buscaCPF);

    if (!$buscar) {
        echo json_encode([
            'status' => 404,
            'message' => 'Usuário não encontrado.'
        ]);
        exit;
    } else {

        $id_usuario = $buscar[0]['id_usuario'];
        $email = $buscar[0]['email_usuario'];

        $codigo = rand(10000, 99999);
        $_SESSION['codigo_recuperacao'] = $codigo;
        $_SESSION['id_usuario'] = $id_usuario;

        // Envia o e-mail com o código de recuperação
        $emailService = new EmailService();
        $emailService->enviar_email_recuperacao($email, $codigo);
    }
} else {
    echo json_encode([
        'status' => 400,
        'message' => 'CPF não enviado.'
    ]);
}
