<?php
    require_once '../database/Database.php';

    class FilaSenha {
        private $db;

        public function __construct() {
            $this->db = new Database('fila_senha');
        }

        public function inserirFilaSenha($nome, $servico, $categoria) {
            $categoria = ($categoria === "CM") ? 0 : 1;
        
            $dados = [
                "nome_fila_senha" => $nome,
                "servico_fila_senha" => $servico,
                "prioridade_fila_senha" => $categoria,
                "status_fila" => "pendente",
            ];
    
            $ultimaSenha = $this->db->select(
                "prioridade_fila_senha = $categoria",
                "fila_senha_created_in DESC",
                1,
                "senha_fila_senha"
            );
        
            $proximaSenha = 1;
            if ($ultimaSenha) {
                $resultado = $ultimaSenha->fetch(PDO::FETCH_ASSOC);
                if ($resultado && isset($resultado['senha_fila_senha'])) {
                    $proximaSenha = (int)$resultado['senha_fila_senha'] + 1;
                }
            }
        
            $dados['senha_fila_senha'] = $categoria . str_pad($proximaSenha, 3, '0', STR_PAD_LEFT);
        
            try {
                return $this->db->insert($dados);
            } catch (Exception $e) {
                throw new Exception("Erro ao inserir na fila: " . $e->getMessage());
            }
        }

        public function buscar_em_atendimento(){
            $senhasEmAtendimento = $this->db->select_monitor_ultimos_chamados()->fetchAll(PDO::FETCH_ASSOC);
            if($senhasEmAtendimento){
                return $senhasEmAtendimento;
            }else{
                return false;
            }
        }

        public function buscarFilaPendenteCategoria() {

            $senhas = $this->db->consulta_fila();
            $fila_pendente = $senhas->fetchAll(PDO::FETCH_ASSOC);

            return $fila_pendente;

        }

        public function buscarSenhasAtendidasNoDia() {
            $senhas = $this->db->consulta_senhas_atendidas_dia();
            $fila_atendida = $senhas->fetchAll(PDO::FETCH_ASSOC);

            return $fila_atendida;
    }
        }

?>
