<?php
    require "../classe/Usuario.php";

    if (($_SERVER['REQUEST_METHOD'] === 'POST')){
  
        // PEGA OS DADOS VIA POST
        $nome = $_POST["nome"];
        $email = $_POST["email"];
        $id_perfil = $_POST["id_perfil"];
        
        // VERIFICA SE OS DADOS FORAM PREENCHIDOS
        if($nome != null || $email != null || $id_perfil != null){   
            
            // INSERE OS DADOS NO OBJETO $objUser
            $objUser = new Usuario();
            $objUser->nome = filter_var($nome, FILTER_SANITIZE_SPECIAL_CHARS);
            $objUser->email = filter_var($email, FILTER_SANITIZE_EMAIL);
            $objUser->id_perfil = $id_perfil;

            // GERA UMA SENHA ALEATORIA E A ENVIA PRO BANCO
            // $objUser->senha = password_hash($objUser->gerarSenha(), PASSWORD_DEFAULT);
            $objUser->senha = password_hash("123", PASSWORD_DEFAULT);
            
            $res = $objUser->cadastrar();
            if($res){
                $resposta = array( "msg" => "Cadastrado com sucesso", "status" => "OK");
                echo json_encode($resposta);

            }else{
                $resposta = array( "msg" => "Erro ao cadastrar", "status" => "ERRO");
                echo json_encode($resposta);
            }                    
        }
        else{
            $resposta = array( "msg" => "Preencha todos os campos", "status" => "ERRO");
            echo json_encode($resposta);
            exit;
        }
            
    }
?>