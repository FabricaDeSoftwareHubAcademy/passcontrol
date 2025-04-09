<?php
require './app/DB/Database.php';

ini_set('display_errors', 1);
error_reporting(E_ALL);

class Usuario {
    private $db;

    public function __construct() {
        $this->db = new Database('usuarios');
    }

    public function cadastrar($nome) {
        $values = ['nome' => $nome];
        return $this->db->insert($values);
    }

    public function logar($email, $senha){
        $db = new Database('usuario'); // ou 'usuarios' dependendo do nome da sua tabela
        $res = $db->login($email, $senha);
    
        if ($res) {
            // Se o login foi bem-sucedido, redireciona para a página de atendimento
            header("Location: app/admin/view/atendimento.php");
            exit(); // Sempre use exit() após header() para garantir que o código não continue a ser executado
        } else {
            return false; // Caso contrário, retorna false
        }
    }
}

$db = new Database('usuario');