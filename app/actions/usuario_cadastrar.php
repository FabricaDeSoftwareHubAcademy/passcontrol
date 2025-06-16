<?php
    require_once '../classes/Usuario.php';

    if (($_SERVER['REQUEST_METHOD'] === 'POST')){
  
        // PEGA OS DADOS VIA POST
        $nome = $_POST["nome_usuario"];
        $email = $_POST["email_usuario"];
        $cpf = $_POST["cpf_usuario"];
        $id_perfil = $_POST["id_perfil_usuario"];
        
        // VERIFICA SE OS DADOS FORAM PREENCHIDOS
        if($nome != null || $email != null || $cpf != null || $id_perfil != null){   
            
            // INSERE OS DADOS NO OBJETO $objUser
            $objUser = new Usuario();
            $objUser->nome = filter_var($nome, FILTER_SANITIZE_SPECIAL_CHARS);
            $objUser->email = filter_var($email, FILTER_SANITIZE_EMAIL);
            $objUser->cpf = preg_replace('/\D/', '',(filter_var($cpf, FILTER_SANITIZE_SPECIAL_CHARS)));
            $objUser->id_perfil = filter_var($id_perfil, FILTER_SANITIZE_NUMBER_INT);

            // GERA UMA SENHA ALEATORIA E A ENVIA PRO BANCO
            // $objUser->senha = password_hash($objUser->gerar_senha(), PASSWORD_DEFAULT);
            // $objUser->senha = password_hash('123', PASSWORD_DEFAULT);
            // Pega CPF só com números (já sanitizado)
            
            $cpf_limpo = $objUser->cpf;
            $cpf_parcial = substr($cpf_limpo, 0, 5); // CAPTURA OS 5 PRIMEIROS DIGITOS DO CPF
            
            $partes_nome = explode(' ', trim($objUser->nome)); // CAPTURA O ULTIMO NOME
            $ultimo_nome = end($partes_nome);

            $senha_generica = $cpf_parcial . '@' . $ultimo_nome;
            $objUser->senha = password_hash($senha_generica, PASSWORD_DEFAULT);

            // echo ($objUser->senha);
            
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