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

    // public function buscar_por_id($id){
    //     return $this->db->select("id_perfil =". $id)->fetch(PDO::FETCH_ASSOC);
    // }
}
