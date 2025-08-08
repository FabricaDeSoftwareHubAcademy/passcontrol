<?php

// ini_set('display_errors', 1);
// error_reporting(E_ALL);

require_once 'Env.php';

$rootPath = dirname(__DIR__, 2);
loadEnv($rootPath . '/.env');

class Database
{
    private $conn;
    private string $local;
    private string $db;
    private string $user;
    private string $password;
    private $table;

    // O construtor garante que a conexão seja realizada assim que o objeto Database for instanciado
    public function __construct($table = null)
    {
        $this->local = getenv('DB_HOST');
        $this->db = getenv('DB_NAME');
        $this->user = getenv('DB_USER');
        $this->password = getenv('DB_PASS');
        $this->table = $table;

        $this->conecta();
    }

    public function conecta()
    {
        try {
            $this->conn = new PDO("mysql:host=" . $this->local . ";dbname=$this->db", $this->user, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // echo "Conectado com sucesso";
        } catch (PDOException $err) {
            // die("Connection Failed: ". $err->getMessage());
            return false;
        }
    }
    public function getConnection()
    {
        return $this->conn;
    }

    public function execute($query, $binds = [])
    {
        try {
            $stmt = $this->conn->prepare($query);
            $stmt->execute($binds);
            return $stmt;
        } catch (PDOException $erro) {
            // die("\nFalha na execucao! <br>". $erro->getMessage());
            return false;
        }
    }

    public function insert($values)
    {
        $fields = array_keys($values);
        $binds = array_pad([], count($fields), "?");
        $query = "INSERT INTO " . $this->table . "(" . implode(",", $fields) . ") VALUES (" . implode(",", $binds) . ")";

        $res = $this->execute($query, array_values($values));

        if ($res) {
            return $res;
        } else {
            return false;
        }
    }

    public function select($where = null, $order = null, $limit = null, $fields = '*')
    {
        $where = !empty($where) ? ' WHERE ' . $where : '';
        $order = !empty($order) ? ' ORDER BY ' . $order : '';
        $limit = !empty($limit) ? ' LIMIT ' . $limit : '';

        $query = 'SELECT ' . $fields . ' FROM ' . $this->table . ' ' . $where . ' ' . $order . ' ' . $limit;

        $res = $this->execute($query);
        if ($res) {
            return $res;
        } else {
            return false;
        }
    }


    public function update($where, $array)
    {
        $fields = array_keys($array);
        $values = array_values($array);

        $query = "UPDATE $this->table SET " . implode('=?,', $fields) . "=? WHERE $where";

        $res = $this->execute($query, $values);
        if ($res) {
            return $res->rowCount();
        } else {
            return false;
        }
    }

    public function delete($where)
    {
        $query = "DELETE FROM $this->table WHERE $where";

        $del = $this->execute($query);
        $del = $del->rowCount();

        if ($del) {
            return true;
        } else {
            return false;
        }
    }

    public function consulta_fila()
    {
        $query = "SELECT fila_senha.nome_fila_senha, servico.nome_servico, fila_senha.prioridade_fila_senha as categoria
        FROM fila_senha INNER JOIN servico
        ON servico.id_servico = fila_senha.id_servico_fk
        WHERE status_fila_senha = 'pendente'";

        $res = $this->execute($query);

        if ($res) {
            return $res;
        } else {
            return false;
        }
    }

    public function consulta_senhas_atendidas_dia()
    {
        $query = "SELECT 
                    fila_senha.id_fila_senha AS senha,
                    fila_senha.nome_fila_senha AS nome,
                    servico.nome_servico AS servico,
                    fila_senha.fila_senha_created_in AS inicio,
                    fila_senha.fila_senha_updated_in AS termino,
                    fila_senha.prioridade_fila_senha AS categoria
                  FROM fila_senha 
                  INNER JOIN servico 
                  ON servico.id_servico = fila_senha.id_servico_fk
                  WHERE fila_senha.status_fila = 'em atendimento' 
                  AND DATE(fila_senha.fila_senha_updated_in) = CURDATE()
                  ORDER BY fila_senha.fila_senha_updated_in ASC";

        $res = $this->execute($query);

        if ($res) {
            return $res;
        } else {
            return false;
        }
    }

    public function inner_join_usuario_servico()
    {
        $query = "SELECT usuario.id_usuario, servico.id_servico, servico.nome_servico
        FROM usuario
        INNER JOIN usuario_servico
        ON usuario.id_usuario = usuario_servico.id_usuario_fk
        INNER JOIN servico
        ON servico.id_servico = usuario_servico.id_servico_fk
        AND servico.status_servico = 1";

        $res = $this->execute($query);

        if ($res) {
            return $res;
        } else {
            return false;
        }
    }

    public function select_monitor_ultimos_chamados(){
        $query = 
        "SELECT 
        fila_senha.nome_fila_senha,
        CONCAT(
            IF(fila_senha.prioridade_fila_senha = 1, 'PR', 'CM'), 
            ' ',
            fila_senha.id_fila_senha
            ) AS senha_chamada,
        fila_senha.status_fila_senha,
        CONCAT (
            ponto_atendimento.nome_ponto_atendimento, 
            ' - ', 
            ponto_atendimento.identificador_ponto_atendimento
            ) AS nome_ponto_atendimento,
        servico.nome_servico
        FROM fila_senha
        INNER JOIN servico 
        ON servico.id_servico = fila_senha.id_servico_fk
        INNER JOIN ponto_atendimento
        ON ponto_atendimento.id_ponto_atendimento = fila_senha.id_ponto_atendimento
        WHERE fila_senha.status_fila_senha = 'em atendimento'
        ORDER BY fila_senha.id_fila_senha DESC
        LIMIT 4
        ";

        $res = $this->execute($query);

        if ($res) {
            return $res;
        } else {
            return false;
        }
    }
}
