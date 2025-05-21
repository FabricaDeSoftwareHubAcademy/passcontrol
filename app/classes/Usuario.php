<?php
/* require './app/database/Database.php';

ini_set('display_errors', 1);
error_reporting(E_ALL);

class Usuario {
    private $db;

    public function __construct() {
        $this->db = new Database('usuarios');
    }

    public function cadastrar($nome) {
        $values = ['nome' => $nome];
        return $this->db->insert($values);
    }

    public function logar($email, $senha){
        $db = new Database('usuario'); // ou 'usuarios' dependendo do nome da sua tabela
        $res = $db->login($email, $senha);
    
        if ($res) {
            // Se o login foi bem-sucedido, redireciona para a página de atendimento
            header("Location: ./app/admin/view/atendimento.php");
            exit(); // Sempre use exit() após header() para garantir que o código não continue a ser executado
        } else {
            return false; // Caso contrário, retorna false
        }
    }
}

$db = new Database('usuario'); ##### CÓDIGO ANTIGO #####*/

require dirname(__DIR__, 2) . '/app/database/Database.php';

class Usuario {
    private $db;

    // Construtor que instância o Database uma única vez
    public function __construct() {
        $this->db = new Database('usuario'); // Nome da tabela pode ser alterado conforme necessidade
    }

    // Função para cadastrar um novo usuário
    public function cadastrar($nome, $email, $cpf, $senha, $id_perfil) {
        $senha_hash = password_hash($senha, PASSWORD_DEFAULT);  // Criptografando a senha
        $values = [
            'nome' => $nome,
            'email' => $email,
            'cpf' => $cpf,
            'senha' => $senha_hash,
            'id_perfil' => $id_perfil
        ];
        return $this->db->insert($values);
    }

    public function buscar($where = null, $order = null, $limit = null) {
        return $this->db->select($where, $order, $limit)->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function buscar_id_usu($id_usuario){
        $res = new Database("usuario");
        $data = $res->select("id_usuario =".$id_usuario);
        
        return $data;
   }

    // Função para realizar o login
    public function logar($email, $senha) {
        $res = $this->db->login($email, $senha);

        if ($res) {
            // Se o login foi bem-sucedido, redireciona para a página de atendimento
            header("Location: ./app/admin/view/atendimento.php");
            exit(); // Sempre use exit() após header() para garantir que o código não continue a ser executado
        } else {
            return false; // Caso contrário, retorna false
        }
    }

    // Função para buscar usuário por ID
    public function buscarPorId($id_usuario) {
        return $this->db->select("id_usuario = $id_usuario");
    }

    // Função para atualizar dados do usuário
    public function atualizar($id_usuario, $nome, $email, $id_perfil) {
        $values = [
            'nome' => $nome,
            'email' => $email,
            'id_perfil' => $id_perfil
        ];
        return $this->db->update("id_usuario = $id_usuario", $values);
    }

    // Função para alternar o status do usuário
    public function alternarStatus($id_usuario, $status_usuario) {
        $status_alternar = ($status_usuario == 'ativo') ? 'inativo' : 'ativo';
        return $this->db->update('id_usuario =' . $id_usuario, ['status_usuario' => $status_alternar]);
    }

    // Função para gerar uma senha aleatória
    public function gerarSenha($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ*+-&@!#$.';
        $charactersLength = strlen($characters);
        $randomPw = '';

        for ($i = 0; $i < $length; $i++) {
            $randomPw .= $characters[random_int(0, $charactersLength - 1)];
        }

        return $randomPw;
    }

    // Função para listar perfil de usuário com base no ID do perfil
    public function listarNomePerfil($id_perfil) {
        $db = new Database('perfil_usuario');
        return $db->select("id_perfil = $id_perfil");
    }
}

?>