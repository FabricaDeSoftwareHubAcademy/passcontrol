<?php

// ini_set('display_errors', 1);
// error_reporting(E_ALL);

class Database {
    private $conn;
    private string $local = '192.168.22.9';
    
    private string $db = 'passcontrol' ;
    private string $user = 'fabrica32';

    private string $password = 'fabrica2025';

    private $table;

    // O construtor garante que a conexão seja realizada assim que o objeto Database for instanciado
    public function __construct($table = null) {
        $this->table = $table;
        $this->conecta();  // Conectar ao banco de dados logo ao criar a instância
    }

    public function conecta(){
        try{
            $this->conn = new PDO("mysql:host=".$this->local.";dbname=$this->db",$this->user,$this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // echo "Conectado com sucesso";
        }catch(PDOException $err){
            die("Connection Failed". $err->getMessage());
        }
    }

    public function execute($query, $binds = []){
        try{
            $stmt = $this->conn->prepare($query);
            $stmt->execute($binds);
            return $stmt;
        }
        catch(PDOException $erro){
            print_r($query);
            die("\nFalha na conecção! (fn_exec) <br>". $erro->getMessage());
        }
    }


    public function login($email, $senha) {
        $verificar = $this->conn->prepare("SELECT id_usuario, senha FROM usuario WHERE email = :e");
        $verificar->bindValue(":e", $email);
        $verificar->execute();
        
        if ($verificar->rowCount() > 0) {
            $dados = $verificar->fetch();
            
            // Verifica a senha criptografada
            if (password_verify($senha, $dados['senha'])) {
                session_start();
                $_SESSION['id_usuario'] = $dados['id_usuario'];
                return true;
            }
        }
        return false;
    }

    public function insert($values){
        $fields = array_keys($values);
        $binds = array_pad([],count($fields),"?");
        $query = "INSERT INTO ". $this->table . "(".implode(",", $fields).") VALUES (".implode(",",$binds).")";

        $out = $this->execute($query,array_values($values));

        if($out){
            // echo "<script> alert ('Cadastrado com sucesso!') </script>";
            return $out;
        }
        else{
            echo "<script> alert ('Falha na execução, usuário não cadastrado!') </script>";
        }
    }

    public function select($where = null, $order = null, $limit = null, $fields = "*"){
        $where = strlen($where) ? "WHERE ".$where : "";
        $order = strlen($order) ? "ORDER BY".$order : "";
        $limit = strlen($limit) ? "LIMIT ".$limit : "";

        $query = "SELECT $fields FROM $this->table $where $order $limit";

        // return $this->execute($query)->fetch(PDO::FETCH_ASSOC);

        return $this->execute($query)->fetch(PDO::FETCH_ASSOC);
    }

    public function select_pdostmt($where = null, $order = null, $limit = null, $fields = "*"){
        $where = strlen($where) ? "WHERE ".$where : "";
        $order = strlen($order) ? "ORDER BY".$order : "";
        $limit = strlen($limit) ? "LIMIT ".$limit : "";

        $query = "SELECT $fields FROM $this->table $where $order $limit";

        return $this->execute($query);
    }

    public function update($where, $array){
        $fields = array_keys($array);
        $values = array_values($array);

        $query = "UPDATE $this->table SET ".implode('=?,',$fields)."=? WHERE $where";

        $res = $this->execute($query, $values);
        return $res->rowCount();
    }
}