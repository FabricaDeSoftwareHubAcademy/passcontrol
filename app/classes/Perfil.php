<?php
require_once "../database/Database.php";

class Perfil {
    private $db;

    public function __construct() {
        $this->db = new Database('perfil_usuario');
    }

    public function buscar($where = null, $order = null, $limit = null) {
        return $this->db->select($where, $order, $limit)->fetchAll(PDO::FETCH_ASSOC);
    }

    public function buscarPorId($id) {
        $pdo = $this->db->getConnection();
        $stmt = $pdo->prepare("SELECT * FROM perfil_usuario WHERE id_perfil_usuario = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Busca IDs das permissões vinculadas a um perfil
    public function buscarPermissoes($idPerfil) {
        $pdo = $this->db->getConnection();
        $stmt = $pdo->prepare("SELECT id_permissoes_fk FROM perfil_usuario_permissoes WHERE id_perfil_usuario_fk = ?");
        $stmt->execute([$idPerfil]);
        return $stmt->fetchAll(PDO::FETCH_COLUMN);
    }

    // Busca nomes das permissões vinculadas a um perfil
    public function buscarNomesPermissoes($idPerfil) {
        $pdo = $this->db->getConnection();

        $sql = "
            SELECT p.nome_permissoes
            FROM perfil_usuario_permissoes pp
            INNER JOIN permissoes p ON pp.id_permissoes_fk = p.id_permissoes
            WHERE pp.id_perfil_usuario_fk = ?
        ";

        $stmt = $pdo->prepare($sql);
        $stmt->execute([$idPerfil]);

        $permissoes = $stmt->fetchAll(PDO::FETCH_COLUMN);

        if (!$permissoes) {
            return ['Nenhuma'];
        }

        return $permissoes;
    }

    public function inserir($dados) {
        return $this->db->insert($dados);
    }

    // Edita perfil com condição por id e array dados
    public function editar($id, $dados) {
        return $this->db->update("id_perfil_usuario = {$id}", $dados);
    }

    // Alterar status (ativo/inativo) do perfil
    public function alterarStatus($id_perfil, $novo_status) {
        return $this->db->update("id_perfil_usuario = {$id_perfil}", ['status_perfil_usuario' => $novo_status]);
    }

    // Vincular uma permissão ao perfil
    public function vincularPermissao($idPerfil, $idPermissao) {
        $pdo = $this->db->getConnection();
        $sql = "INSERT INTO perfil_usuario_permissoes (id_perfil_usuario_fk, id_permissoes_fk) VALUES (:idPerfil, :idPermissao)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':idPerfil', $idPerfil, PDO::PARAM_INT);
        $stmt->bindParam(':idPermissao', $idPermissao, PDO::PARAM_INT);
        return $stmt->execute();
    }

    // Remover todas permissões vinculadas ao perfil
    public function removerPermissoes($idPerfil) {
        $pdo = $this->db->getConnection();
        $sql = "DELETE FROM perfil_usuario_permissoes WHERE id_perfil_usuario_fk = :idPerfil";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':idPerfil', $idPerfil, PDO::PARAM_INT);
        return $stmt->execute();
    }
}
