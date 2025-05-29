<?php
    require './app/classes/Usuario.php';

    ini_set('display_errors', 1);
    error_reporting(E_ALL);

    
    if(isset($_POST['cpf'])){
        // $cpf = addslashes($_POST['cpf']);
        // $senha = addslashes($_POST['senha']);
        
        $cpf_retificado = preg_replace('/\D/', '', $_POST['cpf']);
        $senha_retificada = filter_var($_POST['senha'], FILTER_SANITIZE_SPECIAL_CHARS);

        $cpf_retificado = addslashes($cpf_retificado);
        $senha_retificada = addslashes($senha_retificada);
        
        $objUsuario = new Usuario();
        $res = $objUsuario->logar($cpf_retificado, $senha_retificada);

        if($res){
            header("location: ./app/view/atendimento.php");
            exit();
        }else{
            // echo "<script>alert('cpf ou Senha incorreto!') </script>";
            return; // Caso contrário, retorna false
        }
    }
?>