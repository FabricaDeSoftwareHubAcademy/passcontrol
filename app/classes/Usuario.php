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

    const pagesNavigation =[
        5 => ['atendimento.php', 'monitor_modal.php', 'menuadm_usuario.php', 'relatorio_diario.php'],
        6 => ['atendimento.php', 'monitor_modal.php', 'menusup_usuario.php', 'relatorio_diario.php'],
        7 => ['atendimento.php', 'monitor_modal.php'],
        8 => []
    ];

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

    public function definirNovaSenha($id_usuario, $nova_senha)
    {
        $id_usuario = (int)$id_usuario;

        // Valida se a senha atende aos critérios
        if (
            strlen($nova_senha) < 8 ||
            !preg_match('/[A-Z]/', $nova_senha) ||
            !preg_match('/[0-9]/', $nova_senha) ||
            !preg_match('/[!@#$%^&*(),.?":{}|<>]/', $nova_senha)
        ) {
            return json_encode([
                'success' => false,
                'message' => 'A senha não atende aos requisitos de segurança. Utilize no mínimo 8 dígitos, incluindo pelo menos 1 número, 1 letra maiúscula e 1 caractere especial.'
            ]);
        }

        $nova_senha_hash = password_hash($nova_senha, PASSWORD_DEFAULT);

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
    
    public function verificarSenhaAtual($id_usuario, $senha_atual)
    {

        // Garante que o banco está apontando para a tabela "usuario"
        $this->db = new Database("usuario");

        // ira buscar a senha do usuário com o id correspondente.
        $resultado = $this->db->select("id_usuario = $id_usuario", null, null, 'senha_usuario');

        // se não acha-la o rowCount será 0, ou seja, não existe no banco
        if ($resultado->rowCount() === 0) {
            return false;
        }

        $linha = $resultado->fetch(PDO::FETCH_ASSOC);
        $senha_hash = $linha['senha_usuario'];

        //ira verificar se a senha atual corresponde ao harsh no banco
        return password_verify($senha_atual, $senha_hash);
    }
    public function atualizarDadosLogin($id_usuario, $nome, $email, $foto_url = null)
    {
        if (!$id_usuario || !$nome || !$email) {
            return false;
        }
        $values = [
            'nome_usuario' => $nome,
            'email_usuario' => $email,
        ];
        if ($foto_url !== null) {
            $values['url_foto_usuario'] = $foto_url;
        }
        return $this->db->update("id_usuario = $id_usuario", $values);
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

    public function select_servicos_atendidos()
    {

        $res = $this->db->inner_join_usuario_servico()->fetchAll(PDO::FETCH_ASSOC);

        return $res;
    }

    // INSERE O ID DO USUARIO E OS ID'S DOS SERVICOS NA TABELA INTERMEDIARIA usuario_servico
    public function vincular_servico($cpf, $id_usuario, $lista_servicos)
    {
        if ($id_usuario == null) {
            $usuario = $this->buscar("cpf_usuario = $cpf");

            if (!$usuario || !isset($usuario[0]["id_usuario"])) {
                return false; // Não encontrou o usuário
            }

            $id_usuario = $usuario[0]["id_usuario"];
        }

        $this->db = new Database("usuario_servico");

        $sucesso = true;

        foreach ($lista_servicos as $id_servico) {
            $values = [
                "id_usuario_fk" => $id_usuario,
                "id_servico_fk" => $id_servico
            ];
            $res = $this->db->insert($values);

            if (!$res) {
                $sucesso = false; // marca erro mas continua tentando os outros
            }
        }
        return $sucesso;
    }

    public function limpa_servicos_usuario($id_usuario)
    {
        $this->db = new Database("usuario_servico");

        return $this->db->delete("id_usuario_fk = $id_usuario"); // limpa os servicos vinculados do usuario
    }

    public static function getPagesNavigation($id_perfil_usuario_fk){
        return SELF::pagesNavigation[$id_perfil_usuario_fk]; 
    }
}
