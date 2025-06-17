<?php
require_once "../database/Database.php";

class Permissao {
    private $db;
    private $tabela = 'permissoes';  // nome correto da tabela

    public function __construct() {
        $this->db = new Database($this->tabela);
    }

    // Método flexível para buscar permissões com filtro, ordenação e limite opcionais
    public function buscar($where = null, $order = null, $limit = null) {
        return $this->db->select($where, $order, $limit)->fetchAll(PDO::FETCH_ASSOC);
    }

    public function buscarPorId($id) {
        $pdo = $this->db->getConnection();
        $stmt = $pdo->prepare("SELECT * FROM {$this->tabela} WHERE id_permissao = ?");
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
        $stmt = $pdo->prepare("DELETE FROM {$this->tabela} WHERE id_permissao = ?");
        return $stmt->execute([$id]);
    }
}
