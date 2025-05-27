<?php
require_once '../database/Database.php';

class Servico {
    private $conn;

    public int $id_servico;
    public string $nome_servico;
    public string $codigo_servico;
    public string $ativo;
    public ?string $imagem;

    public ?string $id_imagem_servico = null;
    public ?int $id_atendimento = null;
    public ?int $id_guiche = null;
    public ?int $id_senha = null;

    public function __construct() {
        $db = new Database();
        $this->conn = $db->getConnection(); 
    }

    public function buscar($where = null, $order = null, $limit = null) {
        $query = "SELECT * FROM servico";
        if ($where) $query .= " WHERE $where";
        if ($order) $query .= " ORDER BY $order";
        if ($limit) $query .= " LIMIT $limit";

        $stmt = $this->conn->query($query);
        return $stmt->fetchAll(PDO::FETCH_CLASS, self::class);
    }

    public function buscar_por_id($id_servico) {
        $stmt = $this->conn->prepare("SELECT * FROM servico WHERE id_servico = ?");
        $stmt->execute([$id_servico]);
        return $stmt->fetchObject(self::class);
    }

    public function buscar_por_ativo($ativo) {
        $stmt = $this->conn->prepare("SELECT * FROM servico WHERE ativo = ?");
        $stmt->execute([$ativo]);
        return $stmt->fetchAll(PDO::FETCH_CLASS, self::class);
    }

    public function criar() {
        $stmt = $this->conn->prepare("INSERT INTO servico (nome_servico, codigo_servico, ativo) VALUES (?, ?, 'ATIVO')");
        return $stmt->execute([$this->nome_servico, $this->codigo_servico]);
    }

    public function editar() {
        $stmt = $this->conn->prepare("UPDATE servico SET nome_servico = ?, codigo_servico = ? WHERE id_servico = ?");
        return $stmt->execute([$this->nome_servico, $this->codigo_servico, $this->id_servico]);
    }

    public function editar_com_icone($icone) {
        $sql = "UPDATE servico SET nome_servico = ?, codigo_servico = ?, imagem = ? WHERE id_servico = ?";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([$this->nome_servico, $this->codigo_servico, $icone, $this->id_servico]);
    }

    public function alternar_ativo($id_servico, $status) {
        $novo_status = ($status == 'ATIVO') ? 'INATIVO' : 'ATIVO';
        $stmt = $this->conn->prepare("UPDATE servico SET ativo = ? WHERE id_servico = ?");
        return $stmt->execute([$novo_status, $id_servico]);
    }

    public function cadastrar($codigo, $nome, $icone) {
        $sql = "INSERT INTO servico (codigo_servico, nome_servico, imagem, ativo) 
                VALUES (:codigo, :nome, :icone, 'ATIVO')";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':codigo', $codigo);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':icone', $icone);
        return $stmt->execute();
    }
}
