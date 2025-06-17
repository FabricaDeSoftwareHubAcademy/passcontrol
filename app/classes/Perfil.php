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

    // Método para buscar IDs das permissões vinculadas a um perfil
    public function buscarPermissoes($idPerfil) {
        $pdo = $this->db->getConnection();
        $stmt = $pdo->prepare("SELECT id_permissao_fk FROM perfil_permissao WHERE id_perfil_usuario_fk = ?");
        $stmt->execute([$idPerfil]);
        return $stmt->fetchAll(PDO::FETCH_COLUMN);
    }

    // Novo método para buscar nomes das permissões vinculadas a um perfil
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
    
        $permissoes = $stmt->fetchAll(PDO::FETCH_COLUMN); // retorna apenas os nomes das permissões
    
        if (!$permissoes) {
            return ['Nenhuma'];
        }
    
        return $permissoes;
    }
    
    

    public function inserir($dados) {
        return $this->db->insert($dados);
    }

    // Ajuste: Ordem correta dos parâmetros conforme sua classe Database (condição, dados)
    public function editar($id, $dados) {
        return $this->db->update("id_perfil_usuario = {$id}", $dados);
    }

    public function alterarStatus($id_perfil, $novo_status) {
        // Ordem condição, dados
        return $this->db->update("id_perfil_usuario = {$id_perfil}", ['status_perfil_usuario' => $novo_status]);
    }

    public function vincularPermissao($idPerfil, $idPermissao) {
        $pdo = $this->db->getConnection();
        $sql = "INSERT INTO perfil_permissao (id_perfil_usuario_fk, id_permissao_fk) VALUES (:idPerfil, :idPermissao)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':idPerfil', $idPerfil, PDO::PARAM_INT);
        $stmt->bindParam(':idPermissao', $idPermissao, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function removerPermissoes($idPerfil) {
        $pdo = $this->db->getConnection();
        $sql = "DELETE FROM perfil_permissao WHERE id_perfil_usuario_fk = :idPerfil";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':idPerfil', $idPerfil, PDO::PARAM_INT);
        return $stmt->execute();
    }
}
