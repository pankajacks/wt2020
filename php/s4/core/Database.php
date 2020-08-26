<?php
namespace Core\Data;

class Database {

    private $host;
    private $dbname;
    private $username;
    private $password;

    public $conn;

    public function __construct() {
        $this->host = HOST;
        $this->dbname = DBNAME;
        $this->username = USERNAME;
        $this->password = PASSWORD;
    }

    public function connect() {
        $this->conn = null;

        try {
            $this->conn = new \PDO(
                "mysql:host={$this->host};dbname={$this->dbname}",
                $this->username,
                $this->password
            );
        } catch(\PDOException $exp) {
            echo "Connection Error: " . $exp->getMessage();
        }

        return $this->conn;
    }
}
?>