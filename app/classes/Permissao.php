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
}
