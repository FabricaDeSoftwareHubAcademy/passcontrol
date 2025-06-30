<?php
// app/actions/usuario_logar.php
session_start();
ini_set('display_errors', 1);
error_reporting(E_ALL);
header('Content-Type: application/json');

require_once '../classes/Usuario.php';

if (isset($_POST['cpf'], $_POST['senha'])) {
    $cpf   = addslashes($_POST['cpf']);
    $cpf_limpo = str_replace(['.', '-'], '', $cpf);
    $senha = addslashes($_POST['senha']);

    $usuario = new Usuario();

    $res = $usuario->logar($cpf_limpo);

if (!$res) {
    echo json_encode([
        'status' => 'nao_cadastrado',
        'code' => 404,
        'msg' => 'Usuário não encontrado. Verifique o CPF informado.'
    ]);
    exit;
}

if ($res['status_usuario'] == 0) {
    echo json_encode([
        'status' => 'usuario_inativo',
        'code' => 403,
        'msg' => 'Usuário inativo. Entre em contato com o administrador.'
    ]);
    exit;
}



if (password_verify($senha, $res['senha_usuario']) && ($res['primeiro_login'] == 1)) {
    echo json_encode([
        'status' => 'primeiro_login',
        'code' => 201,
        'id_usuario' => $res['id_usuario'],
        'msg' => 'Por favor, defina sua senha para continuar.'
    ]);
    exit;

} elseif (password_verify($senha, $res['senha_usuario']) && ($res['primeiro_login'] == 0)) {
    $_SESSION['id_usuario'] = $res['id_usuario'];
    $_SESSION['nome_usuario'] = $res['nome_usuario'];
    $_SESSION['email_usuario'] = $res['email_usuario'];
    $_SESSION['cpf_usuario'] = $res['cpf_usuario'];
    $_SESSION['id_perfil_usuario_fk'] = $res['id_perfil_usuario_fk'];

    $perfil = (int)$res['id_perfil_usuario_fk'];
    $redirect_url = '';

    switch ($perfil) {
        case 5:
            $redirect_url = '/passcon/passcontrol/app/view/menuadm_fluxo.php';
            break;
        case 6:
            $redirect_url = '/passcon/passcontrol/app/view/menusup_fluxo.php';
            break;
        case 7:
            $redirect_url = '/passcon/passcontrol/app/view/menuatend_fluxo.php';
            break;
        default:
            echo json_encode([
                'status' => 'erro',
                'code' => 403,
                'msg' => 'Perfil inválido. Acesso negado.'
            ]);
            exit;
    }

    echo json_encode([
        'status' => 'ok',
        'code' => 200,
        'id_usuario' => $res['id_usuario'],
        'msg' => 'Redirecionar para a tela inicial de atendimento.'
    ]);
    exit;

} else {
    echo json_encode([
        'status' => 'senha incorreta',
        'code' => 400,
        'msg' => 'Senha incorreta.'
    ]);
};
};