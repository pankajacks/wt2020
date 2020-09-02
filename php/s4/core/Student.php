<?php
namespace Core\Data;

class Student {
    public $prn = null;
    public $rollno = null;
    public $fname = null;
    public $lname = null;
    public $mobile = null;
    public $email = null;

    private $table_name = null;
    private $conn = null;

    public function __construct($conn) {
        $this->conn = $conn;
        $this->table_name = STUD_TABLE;
    }

    public function getRecords() {
        $sql = "SELECT * FROM {$this->table_name} ORDER BY prn";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute();

        return $stmt;
    }

    public function getStudentByPrn() {
        $sql = "SELECT * FROM {$this->table_name} WHERE prn like ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(1, $this->prn);
        $stmt->execute();

        return $stmt;
    }

    public function update() {
        $sql = "UPDATE
                    {$this->table_name}
                SET
                    rollno = :rollno,
                    fname = :fname,
                    lname = :lname,
                    mobile = :mobile,
                    email = :email
                WHERE
                    prn = :prn";

        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':rollno',$this->rollno);
        $stmt->bindParam(':fname',$this->fname);
        $stmt->bindParam(':lname',$this->lname);
        $stmt->bindParam(':mobile',$this->mobile);
        $stmt->bindParam(':email',$this->email);
        $stmt->bindParam(':prn',$this->prn);

        $stmt->execute();
        return $stmt->rowCount();
        
    }

    function delete() {
        $sql = "DELETE FROM {$this->table_name} WHERE prn = ?";
        $stmt = $this->conn->prepare($sql);
        $this->prn = \htmlspecialchars($this->prn);
        // echo $this->prn;
        $stmt->bindParam(1,$this->prn);

        // echo $stmt->q
        $stmt->execute();
        return $stmt->rowCount();
    }



}
?>