<?php   
require_once(__DIR__ . '/../database/Database.php');

class Usuario {
    public int $id_usuario;
    public string $nome;
    public string $email;
    public string $cpf;
    public string $senha;
    public int $id_perfil;
    // public string $foto;
    public string $status_usuario;
    private $db;

    // Construtor que instância o Database uma única vez
    public function __construct() {
        $this->db = new Database('usuario');
    }

    // Função para cadastrar um novo usuário
    public function cadastrar() {
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
    public function buscar($where = null, $order = null, $limit = null) {
        return $this->db->select($where, $order, $limit)->fetchAll(PDO::FETCH_ASSOC);
    }

    // Função para atualizar dados do usuário
    public function atualizar($id_usuario) {
        if (!$this->valida_cpf($this->cpf)) {
            throw new Exception("CPF inválido.");
        }
        $values = [
            'nome_usuario' => $this->nome,
            'email_usuario' => $this->email,
            'cpf_usuario' => $this->cpf,
            'id_perfil_usuario_fk' => $this->id_perfil
        ];
        return $this->db->update("id_usuario = $id_usuario", $values);
    }

    // Função para alternar o status do usuário
    public function alternar_status($id_usuario, $status_usuario) {
        $status_alternar = ($status_usuario == 1) ? 0 : 1;
        $values = [
            "status_usuario" => $status_alternar
        ];
        return $this->db->update("id_usuario = $id_usuario", $values);
    }

    // Função para gerar uma senha aleatória
    public function gerar_senha($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ*+-&@!#$.';
        $charactersLength = strlen($characters);
        $randomPw = '';

        for ($i = 0; $i < $length; $i++) {
            $randomPw .= $characters[random_int(0, $charactersLength - 1)];
        }

        return $randomPw;
    }

    // Função para listar perfil de usuário com base no ID do perfil
    public function listar_perfil_usuario($id_perfil) {
        $db = new Database('perfil_usuario');
        return $db->select("id_perfil_usuario = $id_perfil")->fetch(PDO::FETCH_ASSOC);
    }

    // Função para realizar o login
    public function logar($cpf, $senha) {
        $cpf = addslashes($cpf);
        $select_user = $this->db->select("cpf_usuario = '$cpf'", '', '', 'id_usuario, cpf_usuario, senha_usuario, primeiro_login');
    
        if ($select_user->rowCount() > 0) {
            $dados = $select_user->fetch();
    
            if (password_verify($senha, $dados['senha_usuario'])) {
                if (session_status() !== PHP_SESSION_ACTIVE) {
                    session_start();
                }
    
                $_SESSION['id_usuario'] = $dados['id_usuario'];
                $_SESSION['primeiro_login'] = ($dados['primeiro_login'] == 1);
    
                return true;
            }
        }
    
        return false;
    }
       // Função para definir uma nova senha e atualizar o status de primeiro acesso
       public function definirNovaSenha($id_usuario, $nova_senha) {
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }
    
        if (strlen($nova_senha) < 8) {
            throw new Exception("A nova senha deve ter pelo menos 8 caracteres.");
        }
        // Verifica se a senha contém pelo menos um número, uma letra maiúscula e um caractere especial
        $hashed_senha = password_hash($nova_senha, PASSWORD_DEFAULT);
    

        $id_usuario = (int)$id_usuario;
    
        // Atualiza a senha e marca como não sendo mais primeiro acesso
        $this->db->update("id_usuario = $id_usuario", [
            'senha_usuario' => $hashed_senha,
            'primeiro_login' => 0
        ]);
    
        // Atualiza a sessão
        $_SESSION['primeiro_login'] = false;
        
        return true;
    }
    

    private function valida_cpf($cpf) {
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
}

?>