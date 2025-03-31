<?php
require_once __DIR__ . '../../../config/DBGuiche.php';

class Guiche {
    public int $id_guiche;
    public string $num_guiche;
    public string $nome_guiche;
    public string $ativo;

    private $db;

    public function __construct() {
        $this->db = new Database('guiche');
    }

    public function buscar($where = null, $order = null, $limit = null) {
        return $this->db->select($where, $order, $limit)->fetchAll(PDO::FETCH_CLASS, self::class);
    }

    public function buscar_por_id($id_guiche) {
        return $this->db->select('id_guiche =' . $id_guiche)->fetchObject(self::class);
    }

    public function criar() {
        return $this->db->insert([
            'num_guiche' => $this->num_guiche,
            'nome_guiche' => $this->nome_guiche,
            'ativo' => 'ATIVO'
        ]);
    }

    public function editar() {
        $dados = [
            'nome_guiche' => $this->nome_guiche,
            'num_guiche' => $this->num_guiche
        ];
        return $this->db->update('id_guiche = ' . $this->id_guiche, $dados);
    }

    public function alternar_ativo($id_guiche, $status) {
        $status_alternar = $status == 'ATIVO' ? 'INATIVO' : 'ATIVO';
        return $this->db->update('id_guiche = ' . $id_guiche, ['ativo' => $status_alternar]);
    }

    public function excluir() {
        return $this->db->delete('id_guiche =' . $this->id_guiche);
    }
}

