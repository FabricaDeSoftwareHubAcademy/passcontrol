<?php
    class FilaSenhaModel {
        private $conn;

        public function __construct($db) {
            $this->conn = $db;
        }

        public function inserirFilaSenha($nome, $servico, $categoria) {
            $categoria_formatada = ($categoria == "CM") ? "Comum" : "Preferencial";

            $sql = "INSERT INTO fila_senha (nome_fila_senha, servico_fila_senha, categoria_fila_servico) 
                    VALUES (:nome, :servico, :categoria)";
            
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(":nome", $nome);
            $stmt->bindParam(":servico", $servico);
            $stmt->bindParam(":categoria", $categoria_formatada);
            
            return $stmt->execute();
        }
    }
?>