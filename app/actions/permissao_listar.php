<?php
require_once '../database/Database.php';
require_once '../classes/Perfil.php'; // Crie essa classe se ainda não tiver

class PerfilUsuarioModel {
    private $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    public function buscar() {
        $stmt = $this->pdo->prepare("SELECT id_perfil_usuario, nome_perfil_usuario, status_perfil_usuario FROM perfil_usuario");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_CLASS, 'Perfil');
    }
}

$db = new Database();
$pdo = $db->getConnection();
$perfilModel = new PerfilUsuarioModel($pdo);
$perfis = $perfilModel->buscar();

class Permissao {
    private $db;

    public function __construct() {
        $this->db = new Database('permissao');
    }

    public function buscar() {
        return $this->db->select()->fetchAll(PDO::FETCH_ASSOC);
    }
}

$permissaoObj = new Permissao();
$permissoes = $permissaoObj->buscar();