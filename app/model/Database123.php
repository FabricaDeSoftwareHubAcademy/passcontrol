<?php

// ini_set('display_errors', 1);
// error_reporting(E_ALL);

class Database {
    private $conn;
    private string $local = '192.168.22.9';
    private string $db = 'passcontrol';
    private string $user = 'fabrica32';
    private string $password = 'fabrica2025';

    public function __construct() {
        $this->conecta(); 
    }

    private function conecta() {
        try {
            $this->conn = new PDO("mysql:host={$this->local};dbname={$this->db}", $this->user, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $err) {
            die("Connection Failed: " . $err->getMessage());
        }
    }

    public function getConnection() {
        return $this->conn;
    }

    public function login($email, $senha) {
        $verificar = $this->conn->prepare("SELECT id_usuario, senha FROM usuario WHERE email = :e");
        $verificar->bindValue(":e", $email);
        $verificar->execute();

        if ($verificar->rowCount() > 0) {
            $dados = $verificar->fetch();
            if (password_verify($senha, $dados['senha'])) {
                session_start();
                $_SESSION['id_usuario'] = $dados['id_usuario'];
                return true;
            }
        }
        return false;
    }
}
