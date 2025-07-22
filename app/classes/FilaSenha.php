<?php
    require_once '../../database/Database.php';

    class FilaSenha {
        private $db;

        public function __construct() {
            $this->db = new Database('fila_senha');
        }

        public function inserirFilaSenha($nome, $servico, $categoria) {
            $categoria = ($categoria == "CM") ? 0 : 1;

            $dados = [
                "nome_fila_senha" => $nome,
                "servico_fila_senha" => $servico,
                "categoria_fila_servico" => $categoria,
                "status_fila" => "pendente",
            ];

            return $this->db->insert($dados);
        }

        public function buscarFilaPendenteCategoria() {
            $comum = $this->db->select("status_fila_senha = 'pendente' AND prioridade_fila_senha = 0", "fila_senha_created_in ASC");
            $preferencial = $this->db->select("status_fila_senha = 'pendente' AND prioridade_fila_senha = 1", "fila_senha_created_in ASC");
        
            return [
                'comum' => $comum ? $comum->fetchAll(PDO::FETCH_ASSOC) : [],
                'preferencial' => $preferencial ? $preferencial->fetchAll(PDO::FETCH_ASSOC) : []
            ];
        }

    }
