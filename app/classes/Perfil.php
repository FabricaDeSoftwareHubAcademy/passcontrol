<?php
require_once "../database/Database.php";

class Perfil{
    private $db;

    public function __construct() {
        $this->db = new Database('perfil_usuario');
    }
    
    public function buscar($where = null, $order = null, $limit = null) {
        $obj = $this->db->select($where, $order, $limit)->fetchAll(PDO::FETCH_ASSOC);
        return $obj;
    }
    
    // public function buscar_por_ativo($ativo){
    //     $db= new Database('perfil');
    //     $ob = $db->select('ativo='.$ativo)->fetchObject(self::class);
    //     return $ob;
    // }
}
// adicionar cadastrar, editar e alterar status perfil
