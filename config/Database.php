<?php
    class Database {
        private $host = '192.168.22.9';
        private $db_name = 'passcontrol';
        private $username = 'fabrica32';
        private $password = 'fabrica2025';
        private string $table = 'guiche';
        private $conn;

        function __construct($table = null){
            $this->table = $table;
            $this->getConnection();
    
        }
        public function getConnection() {
            $this->conn = null;

            try {
                $this->conn = new PDO("mysql:host={$this->host};dbname={$this->db_name}", $this->username, $this->password);
                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch(PDOException $exception) {
                echo "Erro de conexão: " . $exception->getMessage();
            }

            return $this->conn;
        }
    }
?>