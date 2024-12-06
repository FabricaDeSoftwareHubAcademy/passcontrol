<?php
    class Banco{
        private $pdo;

        public $msgErro = "";

        public function conectar($nome, $host, $usuario, $senha){
            global $pdo;

            try{
                $pdo = new PDO("mysql:dbname=".$nome,$usuario,$senha);
            }catch(PDOException $erro){
                $msgErro = $erro->getMessage();
            }
        }
    }





?>