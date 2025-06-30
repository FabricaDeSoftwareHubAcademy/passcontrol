<?php

### CLASS
require_once '../database/Database.php';
class Servico{

    public int $id_servico;
    public string $nome_servico;
    public string $codigo_servico;
    public string $url_imagem_servico;
    public int $status_servico;

    public function cadastrar(){
        
        $db = new Database('servico');
        $res = $db->insert(
                [
                    'nome_servico' => $this->nome_servico,
                    'codigo_servico' => $this->codigo_servico,
                    'url_imagem_servico' => $this->url_imagem_servico
                ]
            );
        return $res;
    }

    public function buscar($where=null,$order=null,$limit=null){
        $db = new Database('servico');
        $res = $db->select($where,$order,$limit)->fetchAll(PDO::FETCH_CLASS,self::class);
        return $res;
    }

    public function buscar_por_id($id){
        $db = new Database('servico');
        $obj = $db->select('id_servico = '.$id)->fetchObject(self::class);
        return $obj; //retorna um objeto da CLASSE SERVICO!!!!
    }

    public function atualizar(){
        $db = new Database('servico');

        $res = $db->update('id_servico ='.$this->id_servico,
                            [
                                'nome_servico' => $this->nome_servico,
                                'codigo_servico' => $this->codigo_servico,
                                'url_imagem_servico' => $this->url_imagem_servico
                            ]
                        );

        return $res;
    }

    public function atualizar_status($id) {
        $dadosAtuais = $this->buscar_por_id($id);

        if (!$dadosAtuais) {
            return false;
        }

        $novoStatus = ($dadosAtuais->status_servico == 1) ? 0 : 1;

        $db = new Database('servico');

        return $db->update("id_servico = $id", [
            'status_servico' => $novoStatus
        ]);
    }
}