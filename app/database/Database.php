<?php

// ini_set('display_errors', 1);
// error_reporting(E_ALL);

require_once 'Env.php';

$rootPath = dirname(__DIR__, 2);
loadEnv($rootPath . '/.env');

class Database {
    private $conn;
    private string $local;
    private string $db;
    private string $user;
    private string $password;
    private $table;

    // O construtor garante que a conexão seja realizada assim que o objeto Database for instanciado
    public function __construct($table = null) {
        $this->local = getenv('DB_HOST');
        $this->db = getenv('DB_NAME');
        $this->user = getenv('DB_USER');
        $this->password = getenv('DB_PASS');
        $this->table = $table;

        $this->conecta();
    }

    public function conecta(){
        try{
            $this->conn = new PDO("mysql:host=".$this->local.";dbname=$this->db",$this->user,$this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // echo "Conectado com sucesso";
        }catch(PDOException $err){
            die("Connection Failed: ". $err->getMessage());
        }
    }

    public function execute($query, $binds = []){
        try{
            $stmt = $this->conn->prepare($query);
            $stmt->execute($binds);
            return $stmt;
        }
        catch(PDOException $erro){
            // print_r($query);
            die("\nFalha na execucao! <br>". $erro->getMessage());
        }
    }    

    public function insert($values){
        $fields = array_keys($values);
        $binds = array_pad([],count($fields),"?");
        $query = "INSERT INTO ". $this->table . "(".implode(",", $fields).") VALUES (".implode(",",$binds).")";

        $res = $this->execute($query,array_values($values));

        if($res){
            // echo "<script> alert ('Cadastrado com sucesso!') </script>";
            return $res;
        }
        else{
            // echo "<script> alert ('Falha na execução, usuário não cadastrado!') </script>";
            return false;
        }
    }

    public function select($where = null, $order = null, $limit = null, $fields = '*'){
        $where = !empty($where) ? ' WHERE '.$where : '';
        $order = !empty($order) ? ' ORDER BY '.$order : '';
        $limit = !empty($limit) ? ' LIMIT '.$limit : '';

        $query = 'SELECT '.$fields.' FROM '.$this->table. ' '.$where. ' '.$order . ' '.$limit ;

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