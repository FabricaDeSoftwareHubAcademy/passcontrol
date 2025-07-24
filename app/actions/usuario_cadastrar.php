<?php
    require_once '../classes/Usuario.php';
    require_once '../classes/PHPMailer.php';

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
            
            $cpf_limpo = $objUser->cpf;
            $cpf_parcial = substr($cpf_limpo, 0, 5); // CAPTURA OS 5 PRIMEIROS DIGITOS DO CPF
            
            $partes_nome = explode(' ', trim($objUser->nome)); // CAPTURA O ULTIMO NOME
            $ultimo_nome = end($partes_nome);
            
            $senha_generica = $cpf_parcial . '@' . $ultimo_nome;
            $objUser->senha = password_hash($senha_generica, PASSWORD_DEFAULT);
               
            $res = $objUser->cadastrar();
            if($res){
                $mailer = new EmailService();
                $mailer->enviar_email_cadastro($email, $senha_generica);

                $res_vincula = "Nao Vinculado";

                //// CAPTURA SERVICOS SELECIONADOS
                try{
                    if(isset($_POST['id_servico'])){
                        $servicos_selecionados = $_POST['id_servico'];

                        $vincula = $objUser->vincular_servico($objUser->cpf,null,$servicos_selecionados);
                        
                        if($vincula){
                            $res_vincula = "Vinculado";
                        }
                    }
                }catch(Exception $erro){
                    $res_vincula = "Nao Vinculado: $erro";
                }
                
                $resposta = array( "msg" => "Usuario cadastrado com sucesso", "status" => 200, "servico" => $res_vincula);
                echo json_encode($resposta);
            }else{
                $resposta = array( "msg" => "Erro ao cadastrar", "status" => 400, "servico" => "Nao Vinculado");
                echo json_encode($resposta);
                $objUser = null;
            }                    
        }
        else{
            $resposta = array( "msg" => "Preencha todos os campos", "status" => 400);
            echo json_encode($resposta);
            exit;
        }
    }
?>