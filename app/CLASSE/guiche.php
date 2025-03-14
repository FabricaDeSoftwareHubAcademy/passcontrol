<?php
require_once __DIR__ . '/../DATABASE/Database.php';


Class Guiche{
    public int $id_guiche;
    public string $num_guiche;
    public string $nome_guiche;
    public string $ativo;


    public function buscar($where=null, $order=null, $limit=null){
        $db = new Database('guiche');

        $res = $db->select($where, $order, $limit)->fetchAll(PDO::FETCH_CLASS,self::class);
        return $res;
    }

    public function buscar_por_id($id_guiche){
        $db = new Database('guiche');

        $obj = $db->select('id_guiche ='.$id_guiche)->fetchObject(self::class);
        return $obj;
    }
    
    public function buscar_por_ativo($ativo){
        $db= new Database('guiche');
        $ob = $db->select('ativo='.$ativo)->fetchObject(self::class);
        return $ob;
    }

    
    public function criar(){
        $db = new Database('guiche');
        $res = $db->insert(
            [
                'num_guiche' => $this->num_guiche,
                'nome_guiche' => $this->nome_guiche,
                'ativo' => 'ATIVO'
            ]
        );
        return $res;
    }

    public function editar(){
        $db = new Database('guiche');
        $dados=[
            'nome_guiche'=>$this->nome_guiche,
            'num_guiche'=>$this->num_guiche
        ];
        $where = 'id_guiche = ' . $this->id_guiche;

        $res=$db->update($where,$dados);
        return $res;
    }

    public function alternar_ativo($id_guiche,$status){
        $db = new Database('guiche');
        $status_alternar = $status == 'ATIVO' ? 'INATIVO' : 'ATIVO';

        $res = $db->update('id_guiche = ' .$id_guiche , ['ativo' => $status_alternar] );
        return $res; 
    }


    public function excluir(){
        $db = new Database('guiche');
        $res = $db->delete('id_guiche ='.$this->id_guiche);
        return $res;
    }

}
