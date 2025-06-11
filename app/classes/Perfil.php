<?php
require_once "../database/Database.php";

class Perfil{
    private $db;

    public function __construct() {
        $this->db = new Database('perfil_usuario');
    }
    
    public function buscar($where = null, $order = null, $limit = null) {
        return $this->db->select($where, $order, $limit)->fetchAll(PDO::FETCH_ASSOC);
    }

    public function inserir($dados) {
        return $this->db->insert($dados);
    }

    public function editar($id, $dados) {
        return $this->db->update("id_perfil_usuario = {$id}", $dados);
    }

    public function alterarStatus($id_perfil, $novo_status) {
        return $this->db->update(
            ['status_perfil_usuario' => $novo_status],
            'id_perfil_usuario = ' . $id_perfil
        );
    }
    
    public function vincularPermissao($idPerfil, $idPermissao) {
        $pdo = $this->db->getConnection();  // pegando o PDO interno da Database
        $sql = "INSERT INTO perfil_permissao (id_perfil_usuario, id_permissao) VALUES (:idPerfil, :idPermissao)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':idPerfil', $idPerfil, PDO::PARAM_INT);
        $stmt->bindParam(':idPermissao', $idPermissao, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function removerPermissoes($idPerfil) {
        $pdo = $this->db->getConnection();  // pegando o PDO interno da Database
        $sql = "DELETE FROM perfil_permissao WHERE id_perfil_usuario = :idPerfil";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':idPerfil', $idPerfil, PDO::PARAM_INT);
        return $stmt->execute();
    }
}
