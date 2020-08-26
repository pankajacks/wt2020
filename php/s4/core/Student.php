<?php
namespace Core\Data;

class Student {
    public $prn = null;
    public $rollno = null;
    public $fname = null;
    public $lname = null;
    public $mobile = null;
    public $email = null;

    private $table_name = "newstudent";
    private $conn = null;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function getRecords() {
        $sql = "SELECT * FROM {$this->table_name} ORDER BY prn";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute();

        return $stmt;
    }

    public function getStudentByPrn($prn) {
        $sql = "SELECT * FROM {$this->table_name} WHERE prn like ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(1, $prn);
        $stmt->execute();

        return $stmt;
    }

}
?>