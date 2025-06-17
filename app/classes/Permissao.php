<?php
require_once "../database/Database.php";

class Permissao {
    private $db;

    public function __construct() {
        // Ajuste o nome da tabela para "permissao" (sem 's' no final), se for esse o nome correto
        $this->db = new Database('permissao');
    }

    public function buscarTodos() {
        return $this->db->select()->fetchAll(PDO::FETCH_ASSOC);
    }

    public function buscarPorId($id) {
        $pdo = $this->db->getConnection();
        $stmt = $pdo->prepare("SELECT * FROM permissao WHERE id_permissao = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function inserir($dados) {
        return $this->db->insert($dados);
    }

    public function atualizar($id, $dados) {
        return $this->db->update("id_permissao = {$id}", $dados);
    }

    public function excluir($id) {
        $pdo = $this->db->getConnection();
        $stmt = $pdo->prepare("DELETE FROM permissao WHERE id_permissao = ?");
        return $stmt->execute([$id]);
    }
}
