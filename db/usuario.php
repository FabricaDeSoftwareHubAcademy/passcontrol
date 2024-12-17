<?php

    Class Usuario{
        private $pdo;

        public $msgErro = "";

        public function logar($email, $senha){ 
            global $pdo;

            $verificaEmailSenha = $pdo->prepare("SELECT id_usuario FROM usuario WHERE email = :e AND senha = :s");
            $verificaEmailSenha->bindValue(":e", $email);
            $verificaEmailSenha->bindValue(":s", $senha);
            $verificaEmailSenha->execute();
            if($verificaEmailSenha->rowCount()>0){
                $dados = $verificaEmailSenha->fetch();
                session_start();
                $_SESSION['id_usuario'] = $dados['id_usuario'];
                return true;
            }else{
                return false;
            }
        }
    }

?>