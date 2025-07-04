<?php
require_once(__DIR__ . '/../database/Database.php');

class Usuario
{
    public int $id_usuario;
    public string $nome;
    public string $email;
    public string $cpf;
    public string $senha;
    public string $foto;
    public string $status_usuario;
    public int $id_perfil;
    private $db;

    // Construtor que instância o Database uma única vez
    public function __construct()
    {
        $this->db = new Database('usuario');
    }

    // Função para cadastrar um novo usuário
    public function cadastrar()
    {
        if (!$this->valida_cpf($this->cpf)) {
            throw new Exception("CPF inválido.");
        }
        $values = [
            'nome_usuario' => $this->nome,
            'email_usuario' => $this->email,
            'cpf_usuario' => $this->cpf,
            'senha_usuario' => $this->senha,
            'id_perfil_usuario_fk' => $this->id_perfil
        ];
        return $this->db->insert($values);
    }

    // Função padrao para buscar na tabela usuario
    public function buscar($where = null, $order = null, $limit = null, $fields = '*')
    {
        return $this->db->select($where, $order, $limit, $fields)->fetchAll(PDO::FETCH_ASSOC);
    }

    // Função para atualizar dados do usuário
    public function atualizar($id_usuario)
    {
        if (!$this->valida_cpf($this->cpf)) {
            throw new Exception("CPF inválido.");
        }
        $values = [
            'nome_usuario' => $this->nome,
            'email_usuario' => $this->email,
            'cpf_usuario' => $this->cpf,
            'url_foto_usuario' => $this->foto,
            'id_perfil_usuario_fk' => $this->id_perfil
        ];
        return $this->db->update("id_usuario = $id_usuario", $values);
    }

    // Função para alternar o status do usuário
    public function alternar_status($id_usuario, $status_usuario)
    {
        $status_alternar = ($status_usuario == 1) ? 0 : 1;
        $values = [
            "status_usuario" => $status_alternar
        ];
        return $this->db->update("id_usuario = $id_usuario", $values);
    }

    // Função para realizar o login
    public function logar($cpf)
    {
        $db = new Database('usuario');
        
        $select_user = $db->select("cpf_usuario = $cpf");
        
        if ($select_user->rowCount() > 0) {
            $dados = $select_user->fetch();
            return $dados;
        } else {
            return false;
        }
    }

    // Função para definir uma nova senha e atualizar o status de primeiro acesso
    public function definirNovaSenha($id_usuario, $nova_senha)
    {
        // Verifica se a senha contém pelo menos um número, uma letra maiúscula e um caractere especial
        $id_usuario = (int)$id_usuario;
        
        $nova_senha_hash = password_hash($nova_senha, PASSWORD_DEFAULT);
        // Atualiza a senha e marca como não sendo mais primeiro acesso
        $resultado = $this->db->update("id_usuario = $id_usuario", [
            'senha_usuario' => $nova_senha_hash,
            'primeiro_login' => 0
        ]);
        
        if ($resultado === false) {
            return json_encode([
                'success' => false,
                'message' => 'Erro ao atualizar a senha.'
            ]);
        } elseif ($resultado === 0) {
            return json_encode([
                'success' => true,
                'message' => 'Mesma senha anterior.'
            ]);
        } else {
            return json_encode([
                'success' => true,
                'message' => 'Senha atualizada com sucesso.'
            ]);
        }
    }
    
    private function valida_cpf($cpf)
    {
        $cpf = preg_replace('/[^0-9]/', '', $cpf);
        if (strlen($cpf) != 11 || preg_match('/(\d)\1{10}/', $cpf)) {
            return false;
        }
        for ($t = 9; $t < 11; $t++) {
            for ($d = 0, $c = 0; $c < $t; $c++) {
                $d += $cpf[$c] * (($t + 1) - $c);
            }
            $d = ((10 * $d) % 11) % 10;
            if ($cpf[$c] != $d) {
                return false;
            }
        }
        return true;
    }

    public function vincular_servico($cpf, $id_servico) {
        $id_usuario = $this->buscar("cpf_usuario =" . $cpf, null, null, "id_usuario");
        $this->db = new Database("usuario_servico");
        $values = [
            "id_usuario_fk = ". $id_usuario[0],
            "id_servico_fk = " . $id_servico
        ];
        
        $res = $this->db->insert($values);
        if($res){
            return true;
        }else{
            return false;
        }

    }
}

// Função para listar perfil de usuário com base no ID do perfil
// public function listar_perfil_usuario($id_perfil)
// {
//     $db = new Database('perfil_usuario');
//     return $db->select("id_perfil_usuario = $id_perfil")->fetch(PDO::FETCH_ASSOC);
// }



// // Função para gerar uma senha aleatória
// public function gerar_senha($length = 10)
// {
    //     $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ*+-&@!#$.';
    //     $charactersLength = strlen($characters);
    //     $randomPw = '';
    
    //     for ($i = 0; $i < $length; $i++) {
        //         $randomPw .= $characters[random_int(0, $charactersLength - 1)];
        //     }
        
        //     return $randomPw;
// }



// busca e retorna todas as permissões que estão vinculadas a um perfil de usuário específico
// public function listar_permissoes_por_perfil(int $id_perfil): array
// {
    
//     $sql  = "SELECT p.nome_permissao
//              FROM permissao p
//              INNER JOIN perfil_permissao pp 
//                ON p.id_permissao = pp.id_permissao
//              WHERE pp.id_perfil_usuario = :idPerfil
//              ORDER BY p.nome_permissao";
//     $stmt = $this->db->execute($sql, ['idPerfil' => $id_perfil]);
//     return $stmt->fetchAll(PDO::FETCH_COLUMN);
// }