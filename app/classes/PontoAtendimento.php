<?php
require_once __DIR__ . '../../database/Database.php';


Class Ponto_Atendimento{
    public int $id_ponto_atendimento;
    public string $identificador_ponto_atendimento;
    public string $nome_ponto_atendimento;
    public int $status_ponto_atendimento;

    public function buscar($where=null, $order=null, $limit=null){
        $db = new Database('ponto_atendimento');
        $res = $db->select($where, $order, $limit)->fetchAll(PDO::FETCH_CLASS,self::class);
        return $res;
    }

    public function buscar_por_id($id_ponto_atendimento){
        $db = new Database('ponto_atendimento');
        $obj = $db->select('id_ponto_atendimento ='.$id_ponto_atendimento)->fetchObject(self::class);
        return $obj;
    }

    public function buscar_por_ativo(int $ativo) {
        $db = new Database('ponto_atendimento');
        return $db->select("status_ponto_atendimento = {$ativo}")->fetchAll(PDO::FETCH_CLASS, self::class);
    }
    
    /* public function buscar_por_ativo($ativo){
        $db= new Database('ponto_atendimento');
        $ob = $db->select("ativo = '{$ativo}'")->fetchObject(self::class);
        return $ob;
    } */

    
    public function cadastrar(){
        $db = new Database('ponto_atendimento');
        $res = $db->insert(
            [
                'identificador_ponto_atendimento' => $this->identificador_ponto_atendimento,
                'nome_ponto_atendimento' => $this->nome_ponto_atendimento,
            ]
        );
        return $res;
    }

    public function editar(){
        $db = new Database('ponto_atendimento');
        $dados=[
            'nome_ponto_atendimento'=>$this->nome_ponto_atendimento,
            'identificador_ponto_atendimento'=>$this->identificador_ponto_atendimento,
        ];
        $where = 'id_ponto_atendimento = ' . $this->id_ponto_atendimento;

        $res=$db->update($where,$dados);
        return $res;
    }

    public function alternar_ativo(int $id_ponto_atendimento, int $status_atual):bool {
        $db = new Database('ponto_atendimento');
        $novo_status = $status_atual == 1 ? 0 : 1;
        return $db->update(
            "id_ponto_atendimento = {$id_ponto_atendimento}",
            ['status_ponto_atendimento' => $novo_status]
        );
    }

    /* public function alternar_ativo($id_ponto_atendimento,$status){
        $db = new Database('ponto_atendimento');
        $status_alternar = $status == 'ATIVO' ? 'INATIVO' : 'ATIVO';
        $res = $db->update('id_ponto_atendimento = ' .$id_ponto_atendimento , ['ativo' => $status_alternar] );
        return $res; 
    } */

    // public function excluir(){
    //     $db = new Database('ponto_atendimento');
    //     $res = $db->delete('id_ponto_atendimento ='.$this->id_ponto_atendimento);
    //     return $res;
    // }
}