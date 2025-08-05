<?php
// app/actions/usuario_logar.php
session_start();
ini_set('display_errors', 1);
error_reporting(E_ALL);
header('Content-Type: application/json');

require_once '../classes/Usuario.php';
try {

    if (isset($_POST['cpf'], $_POST['senha'])) {
        $cpf = addslashes($_POST['cpf']);
        $cpf_limpo = str_replace(['.', '-'], '', $cpf);
        $cpf_limpo = filter_var($cpf_limpo, FILTER_SANITIZE_SPECIAL_CHARS);
        $senha = addslashes($_POST['senha']);

        $usuario = new Usuario();

        $res = $usuario->logar($cpf_limpo);

        // USUARIO NAO ENCONTRADO
        if (!$res) {
            echo json_encode([ 
                'status' => 'nao_cadastrado',
                'code' => 404,
                'msg' => 'Usuário não encontrado. Verifique o CPF informado.'
            ]);
            exit;
        }

        // USUARIO INATIVO
        if ($res['status_usuario'] == 0) { 
            echo json_encode([
                'status' => 'usuario_inativo',
                'code' => 403,
                'msg' => 'Usuário inativo. Entre em contato com o administrador.'
            ]);
            exit;
        }


        // NOVO USUARIO
        if (password_verify($senha, $res['senha_usuario']) && ($res['primeiro_login'] == 1)) {
            echo json_encode([
                'status' => 'primeiro_login',
                'code' => 201,
                'id_usuario' => $res['id_usuario'],
                'msg' => 'Por favor, defina sua senha para continuar.'
            ]);
            exit;
        } elseif (password_verify($senha, $res['senha_usuario']) && ($res['primeiro_login'] == 0)) {

            $resposta_teste = ($res);

            $_SESSION['id_usuario'] = $res['id_usuario'];
            $_SESSION['nome_usuario'] = $res['nome_usuario'];
            $_SESSION['email_usuario'] = $res['email_usuario'];
            $_SESSION['cpf_usuario'] = $res['cpf_usuario'];
            $_SESSION['url_foto_usuario'] = $res['url_foto_usuario'];
            $_SESSION['id_perfil_usuario_fk'] = $res['id_perfil_usuario_fk'];


            switch ($_SESSION['id_perfil_usuario_fk']) {
                case 5: //adm
                    $redirect_url = "./app/view/menu_gestao_usuario.php";
                    break;
                case 6: //supervisor
                    $redirect_url = "./app/view/atendimento_do_dia.php";
                    break;
                case 7: //atendente
                    $redirect_url = "./app/view/atendimento.php";
                    break;
                case 8: //monitor
                    $redirect_url = "./app/view/Monitor.php";
                    break;
                case 9: //auto_atendimento
                    $redirect_url = "./app/view/tela_autoatendimento_page1.php";
                    break;
                default:
                    $redirect_url = "./app/view/atendimento.php";
                    break;
            }
            
            echo json_encode([
                'status' => 'ok',
                'code' => 200,
                'usuario' => [
                    'nome' => $res['nome_usuario'],
                    'email' => $res['email_usuario'],
                    'cpf' => $res['cpf_usuario'],
                    'perfil' => $res['id_perfil_usuario_fk'],
                ],
                'msg' => 'Redirecionar para a tela inicial de atendimento.',
                'redirect' => $redirect_url
            ]);
            exit;

        } else{
            echo json_encode([
                'status' => 'senha incorreta',
                'code' => 400,
                'msg' => 'Senha incorreta.'
            ]);
        }

    } else {
        echo json_encode ([
            'status' => "erro de requisicao",
            'code' => 405,
            'msg' => "Erro, requisicao incorreta."
        ]);
    };

} catch (Exception $error) {
    $error = (string)$error;
    echo json_encode([
        'status' => "ERRO",
        'code' => 421,
        'msg' => $error
    ]);
    exit;
}
