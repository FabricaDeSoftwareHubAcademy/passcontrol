<?php

Class Database {
    // private $conn;
    // private string $local = '192.168.22.9';
    // private string $db = 'passcontrol' ;
    // private string $user = 'fabrica32';
    // private string $password = 'fabrica2025';
    // private string $table = 'guiche';

    private $conn;
    private string $local = 'localhost';
    private string $db = 'passcontrol' ;
    private string $user = 'root';
    private string $password = '';
    private string $table = 'guiche';
    


    function __construct($table = null){
        $this->table = $table;
        $this->conecta();

    }

    private function conecta(){
        try{
            $this->conn = new PDO("mysql:host=".$this->local.";dbname=$this->db",$this->user,$this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $err){
            die("Connection Failed". $err->getMessage());
        }
    }

    public function execute($query, $binds = []){
        try{
            $stmt = $this->conn->prepare($query);
            $stmt->execute($binds);
            return $stmt;
        }catch(PDOException $err){
            die('Connection Failed'. $err->getMessage());
        }
    }

    public function insert($values){
        $fields = array_keys($values);
    
        $binds = array_pad([], count($fields), '?');
    
        //'id_guiche' não precisa pois é auto increment
        $query = 'INSERT INTO '.$this->table.'('.implode(',', $fields).') VALUES ('.implode(',', $binds).')';
    
        $res = $this->execute($query, array_values($values));
    
        return $res ? true : false;
    }
    


    public function select($where = null, $order = null, $limit = null, $fields = '*'){
        $where = strlen($where) ? 'WHERE '.$where : '';
        $order = strlen($order) ? 'ORDER BY '.$order : '';
        $limit = strlen($limit) ? 'LIMIT '.$limit : '';

        $query = 'SELECT '.$fields.' FROM '.$this->table. ' '.$where. ' '.$order . ' '.$limit ;

        return $this->execute($query);
    }


    public function delete($where){

        $query = 'DELETE FROM '.$this->table. ' WHERE '.$where;
        $del = $this->execute($query);
        $del = $del->rowCount();

        if($del == 1){
            return true;
        }else{
            return false;
        }
    }

    public function update($where, $array){
        
        $fields = array_keys($array);
        $values = array_values($array);
    
        $query = 'UPDATE '.$this->table.' SET ' . implode(' = ?, ', $fields) . ' = ? WHERE ' . $where;
    
        $res = $this->execute($query, $values);
        
        return $res->rowCount();
    }
    
}