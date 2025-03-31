<?php
echo "Diretório atual: " . getcwd();
require_once $_SERVER['DOCUMENT_ROOT'] . '/AulaPHPDev32/passcontrol/config/Database.php';


class ClasseGuiche{
    private $conn;
    private string $table = 'guiche';

    public function __construct($table = null) {
        $this->table = $table;
        $this->conecta();
    }

    private function conecta() {
        try {
            // Usa a classe Database para obter a conexão
            $database = new Database();
            $this->conn = $database->getConnection();
        } catch(PDOException $err) {
            die("Connection Failed: " . $err->getMessage());
        }
    }

    public function execute($query, $binds = []) {
        try {
            $stmt = $this->conn->prepare($query);
            $stmt->execute($binds);
            return $stmt;
        } catch(PDOException $err) {
            die('Connection Failed: ' . $err->getMessage());
        }
    }

    public function insert($values) {
        $fields = array_keys($values);
        $binds = array_pad([], count($fields), '?');
        $query = 'INSERT INTO '.$this->table.'('.implode(',', $fields).') VALUES ('.implode(',', $binds).')';
        $res = $this->execute($query, array_values($values));
        return $res ? true : false;
    }

    public function select($where = null, $order = null, $limit = null, $fields = '*') {
        $where = strlen($where) ? 'WHERE '.$where : '';
        $order = strlen($order) ? 'ORDER BY '.$order : '';
        $limit = strlen($limit) ? 'LIMIT '.$limit : '';
        $query = 'SELECT '.$fields.' FROM '.$this->table. ' '.$where. ' '.$order . ' '.$limit;
        return $this->execute($query);
    }

    public function delete($where) {
        $query = 'DELETE FROM '.$this->table. ' WHERE '.$where;
        $del = $this->execute($query);
        $del = $del->rowCount();
        return ($del == 1) ? true : false;
    }

    public function update($where, $array) {
        $fields = array_keys($array);
        $values = array_values($array);
        $query = 'UPDATE '.$this->table.' SET ' . implode(' = ?, ', $fields) . ' = ? WHERE ' . $where;
        $res = $this->execute($query, $values);
        return $res->rowCount();
    }
}
?>