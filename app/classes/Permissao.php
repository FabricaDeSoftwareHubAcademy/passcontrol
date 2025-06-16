<?php
require_once __DIR__ . '/../database/Database.php';

class Permissao {
    private $db;
    private $table = 'permissao';

    public function __construct(Database $database) {
        $this->db = $database;
    }

    public function buscar() {
        $stmt = $this->db->select('status_permissao = 1', 'nome_permissao');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    //método para inserir permissão
    public function inserir(array $dados) {
        $sql = "INSERT INTO {$this->table} (nome_permissao, descricao_permissao, permissao_created_in, permissao_created_by_id) 
                VALUES (:nome, :descricao, :created_in, :created_by)";
        
        $stmt = $this->db->getConnection()->prepare($sql);
        $stmt->bindValue(':nome', $dados['nome_permissao']);
        $stmt->bindValue(':descricao', $dados['descricao_permissao']);
        $stmt->bindValue(':created_in', $dados['permissao_created_in']);
        $stmt->bindValue(':created_by', $dados['permissao_created_by_id']);
        
        $stmt->execute();
        
        return $this->db->getConnection()->lastInsertId();
    }
}
