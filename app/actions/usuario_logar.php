<?php
// app/actions/usuario_logar.php
session_start();
ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once '../classes/Usuario.php';

if (isset($_POST['cpf'], $_POST['senha'])) {
    $cpf   = addslashes($_POST['cpf']);
    $cpf_limpo = str_replace(['.', '-'], '', $cpf);
    $senha = addslashes($_POST['senha']);

    $usuario = new Usuario();

    $res = $usuario->logar($cpf_limpo);

    if($res['primeiro_login'] == 1){
        echo json_encode([
            'status' => 'primeiro_login',
            'code' => 201,
            'msg' => 'Por favor, defina sua senha para continuar.'
        ]);
    }else{
        if(session_status() !== PHP_SESSION_ACTIVE) {
            $_SESSION['id_usuario'] = $dados['id_usuario'];
            $_SESSION['nome_usuario'] = $dados['nome_usuario'];
            $_SESSION['email_usuario'] = $dados['email_usuario'];
            $_SESSION['cpf_usuario'] = $dados['cpf_usuario'];
            $_SESSION['id_perfil_usuario_fk'] = $dados['id_perfil_usuario_fk'];
            session_start();

            echo json_encode([
                'status' => 'ok',
                'code' => 200,
                'msg' => 'Redirecionar para a tela inicial de atendimento.'
            ]);
        }
    }

} else {
    // Se não foi enviado CPF ou senha, redireciona para a página principal
    echo json_encode([
        'status' => 'error',
        'code' => 400,
        'msg' => 'Retornar para o index.'
    ]);
}
