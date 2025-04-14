<?php
    $db_profiles = new Database("perfil");
    $perfis = $db_profiles->execute("SELECT * FROM perfil");

    $db_services = new Database('servico');
    $servicos = $db_services->execute("SELECT * FROM servico WHERE ativo = 'ativo'");

    if(isset($_POST["cadastrar"])) {

        $nome = $_POST["nome"];
        $email = $_POST["email"];
        $cpf = $_POST["cpf"];
        $id_perfil = $_POST["id_perfil"];

        if($nome != null || $email != null || $cpf != null || $id_perfil != null){
            $objUser = new Usuario();
            
            $objUser->nome = $nome;
            $objUser->email = $email;
            $objUser->cpf = $cpf;
            $objUser->id_perfil = $id_perfil;
            // $objUser->senha = password_hash($objUser->gerarSenha(), PASSWORD_DEFAULT);
            $objUser->senha = password_hash("123", PASSWORD_DEFAULT);

            $res = $objUser->cadastrar();
            if($res){
                $resposta = array( "msg" => "Cadastrado com sucesso", "status" => "OK");
                // echo json_encode($resposta);
            }else{
                $resposta = array( "msg" => "Erro ao editar", "status" => "ERRO");
                // echo json_encode($resposta);
            }                    
        }
        else{
            $resposta = array( "msg" => "Preencha todos os campos", "status" => "ERRO");
            // echo json_encode($resposta);
            exit;
        }
    }
?>