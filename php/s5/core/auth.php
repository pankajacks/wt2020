<?php
class User {
    public $username;
    public $password;

    // private $conn;

    // public function __construct($conn) {
    //     $this->conn = $conn;
    // }

    public function checkUser() {
        // $sql = "SELECT * FROM users WHERE username like ? and password like ?";
        // $stmt = $this->conn->prepare($sql);
        
        if ($this->username == "abc" && $this->password == "abc") {
            return true;
        } else {
            return false;
        }
    }
}

?>