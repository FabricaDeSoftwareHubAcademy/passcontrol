<?php
require_once __DIR__ . '/../database/Database.php';

class Permissao {
    private $db;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
    }

    public function temPermissao(int $id_usuario, string $nome_permissao): bool {
        $sql = "SELECT 1
                FROM usuario u
                INNER JOIN perfil_usuario pu ON u.id_perfil_usuario_fk = pu.id_perfil_usuario
                INNER JOIN perfil_usuario_permissoes pup ON pu.id_perfil_usuario = pup.id_perfil_usuario_fk
                INNER JOIN permissoes p ON pup.id_permissoes_fk = p.id_permissoes
                WHERE u.id_usuario = :id_usuario
                  AND p.nome_permissoes = :nome_permissao
                  AND u.status_usuario = 1
                LIMIT 1";

        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':id_usuario', $id_usuario, PDO::PARAM_INT);
        $stmt->bindValue(':nome_permissao', $nome_permissao, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetchColumn() !== false;
    }
}
