<?php
    require_once '../classes/Usuario.php';

    ini_set('display_errors', 1);
    error_reporting(E_ALL);

    $objUsuario = new Usuario();

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $cpf = addslashes($_POST['cpf_usuario']);
        $senha = addslashes($_POST['senha_usuario']);

        $cpf_retificado = preg_replace('/\D/', '', $cpf);
        $senha_retificada = filter_var($senha, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);

        $objUsuario->logar($cpf_retificado, $senha_retificada);
    }

    if(isset($_POST['cpf'])){
        $cpf = addslashes($_POST['cpf']);
        $senha = addslashes($_POST['senha']);
        


        $usuario = new Usuario();
        if($usuario->logar($cpf, $senha)){
            header("location: ./app/view/atendimento.php");
        }else{
            echo "<script>alert('cpf ou Senha incorreto!') </script>";
        }
    }


        // $verificar = $this->conn->prepare("SELECT id_usuario, senha_usuario FROM usuario WHERE email_usuario = :e");
        // $verificar->bindValue(":e", $email);
        // $verificar->execute();
        
        // if ($verificar->rowCount() > 0) {
        //      return $dados = $verificar->fetch();
            
        //     // Verifica a senha criptografada
        //     if (password_verify($senha, $dados['senha_usuario'])) {
        //         session_start();
        //         $_SESSION['id_usuario'] = $dados['id_usuario'];

        //         if($dados['primeiro_acesso']){
        //             header('location: redefinir_senha.php')
        //         }
                
        //         return true;
        //     }
        // }
        // return false;
        
        // $res = $this->db->login($email, $senha);

        // if ($res) {
        //     if($res)
        //     // Se o login foi bem-sucedido, redireciona para a página de atendimento
        //     header("Location: ./app/admin/view/atendimento.php");
        //     exit(); // Sempre use exit() após header() para garantir que o código não continue a ser executado
        // } else {
        //     return false; // Caso contrário, retorna false
        // }
?>