<?php
    $db_profiles = new Database("perfil");
    $perfis = $db_profiles->execute("SELECT * FROM perfil");

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
                ?> <script>alert("Usuario cadastrado com sucesso!")</script> <?php
            }else{
                ?> <script>alert("Erro! Usuario não cadastrado!")</script> <?php
            }                    
        }
        else{
            ?> <script>alert("Preencha todos os campos!")</script> <?php
        }
    }
?>