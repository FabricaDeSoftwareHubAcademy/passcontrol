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

        public function buscar_em_atendimento_modal() {
        $senhasEmAtendimento = $this->db->select_monitor_modal_ultimos_chamados()->fetchAll(PDO::FETCH_ASSOC);
        if (!$senhasEmAtendimento) return false;

        $resultado = [];
        foreach ($senhasEmAtendimento as $s) {
            $resultado[] = [
                'nome_fila_senha'      => $s['nome_fila_senha'],
                'senha_chamada'        => $s['senha_chamada'],
                'nome_ponto_atendimento'=> $s['nome_ponto_atendimento'],
                'servico'              => $s['nome_servico']
            ];
        }
        return $resultado;
    }


        public function buscarFilaPendenteCategoria() {

            $senhas = $this->db->consulta_fila();
            $fila_pendente = $senhas->fetchAll(PDO::FETCH_ASSOC);

            return $fila_pendente;

        }

        public function buscarProximaSenhaPendente() {
            $res = $this->db->select("status_fila_senha = 'pendente'", 'id_fila_senha ASC', '1');
            return $res->fetch(PDO::FETCH_ASSOC) ?: false;
        }

        public function atualizarSenhaParaAtendimento($idFila, $idGuiche, $idUsuario) {
            return $this->db->update(
                'id_fila_senha = ' . (int)$idFila,
                [
                    'status_fila_senha' => 'em atendimento',
                    'id_ponto_atendimento' => (int)$idGuiche,
                    'id_usuario_atendente' => (int)$idUsuario,
                    'fila_senha_chamada_in' => date('Y-m-d H:i:s')
                ]
            );
        }

        public function buscarSenhaEmAtendimentoPorGuiche($idGuiche) {
            $res = $this->db->select(
                "id_ponto_atendimento = " . (int)$idGuiche . " AND status_fila_senha = 'em atendimento'",
                'id_fila_senha ASC',
                '1'
            );
            return $res->fetch(PDO::FETCH_ASSOC) ?: false;
        }

        // NOVA FUNÇÃO para alimentar o modal
        public function buscarDadosSenhaModal($idFila) {
            $fila = $this->db->select("id_fila_senha = " . (int)$idFila)->fetch(PDO::FETCH_ASSOC);
            if (!$fila) return false;

            $servicoDB = new Database('servico');
            $servico = $servicoDB->select('id_servico = ' . (int)$fila['id_servico_fk'])->fetch(PDO::FETCH_ASSOC);

            return [
                'nome' => $fila['nome_fila_senha'] ?? '---',
                'senha' => ($fila['prioridade_fila_senha'] ? 'PR' : 'CM') . str_pad($fila['id_fila_senha'], 3, '0', STR_PAD_LEFT),
                'servico' => $servico['nome_servico'] ?? '---',
                'guiche' => $fila['id_ponto_atendimento'] ?? null
            ];
        }

        public function atualizarPresenca($idFila, $statusPresenca) {
            if (!in_array($statusPresenca, [0, 1], true)) {
                throw new InvalidArgumentException("Status de presença inválido");
            }

            return $this->db->update(
                'id_fila_senha = ' . (int)$idFila,
                [
                    'status_presenca' => (int)$statusPresenca,
                    'fila_senha_iniciada_in' => date('Y-m-d H:i:s')
                ]
            );
        }

        public function chamarNovamente($idFila) {
            if (!$idFila || !is_numeric($idFila)) {
                throw new InvalidArgumentException("ID da senha inválido.");
            }

            return $this->db->update(
                'id_fila_senha = ' . (int)$idFila,
                ['fila_senha_chamada_in' => date('Y-m-d H:i:s')]
            );
        }

        public function encerrarAtendimento($idFila) {
            return $this->db->update(
                'id_fila_senha = ' . (int)$idFila,
                [
                    'status_fila_senha' => 'atendido',
                    'fila_senha_encerrada_in' => date('Y-m-d H:i:s')
                ]
            );
        }

        
        }

?>
