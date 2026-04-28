<?php
class database {
    private $host = 'localhost';
    private $dbname = 'x_brand';
    private $username = 'root';
    private $password = 'yahia123';
    public $conn;

    public function getConnection(){
        $this->conn = null;
        try {
            $dsn = "mysql:host={$this->host};dbname={$this->dbname}";
            $this->conn = new PDO($dsn, $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
        return $this->conn;
    }
}
?>