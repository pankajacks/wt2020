<?php
class User {
    public $name;
    public $email;
    public $username;
    public $password;
    public $token;

    private $conn;
    private $table;

    public function __construct($conn) {
        $this->conn = $conn;
        $this->table = USER_TABLE;
    }

    public function signup() {
        $sql = "INSERT INTO {$this->table} VALUES (:fname, :email, :uname, :pword, :token)";

        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':fname',$this->name);
        $stmt->bindParam(':email',$this->email);
        $stmt->bindParam(':uname',$this->username);
        $stmt->bindParam(':pword',$this->password);

        $this->token = $this->getToken($this->password);

        $stmt->bindParam(':token', $this->token);

        // $this->conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );
        
        if($stmt->execute()===true) {
            $this->sendVerificationToken();
            return true;
        }

        return false;

    }

    public function authenticate() {
        $sql = "SELECT * from {$this->table} where email like ? and password like ?";

        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(1,$this->email);
        $stmt->bindParam(2,$this->password);
        $stmt->execute();

        if ($stmt->rowCount()>0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $this->name = $row['name'];
            return true;
        }

        return false;
    }

    public function isUserExists() {
        $sql = "SELECT * from {$this->table} where email like ?";

        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(1,$this->email);
        $stmt->execute();

        return $stmt->rowCount()>0?true:false;
    }

    public function verifyToken() {
        $sql = "SELECT * from {$this->table} where token like ?";

        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(1,$this->token);
        $stmt->execute();

        if ($stmt->rowCount()>0) {
            $row=$stmt->fetch(PDO::FETCH_ASSOC);
            $this->token = $this->getToken($this->email);
            $sql = "UPDATE {$this->table} SET token = ? where email like ?";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(1, $this->token);
            $stmt->bindParam(2, $row['email']);
            $stmt->execute();
            return true;
        }

        return false;
    }

    public function sendVerificationToken() {

        $subject = "EduTech Email";
        $url = "http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."?req=verify&token=".$this->token;
        $content = "Dear {$this->name}<br><br>
        This is a verification email to verify your email id.<br>
        Click on the link to complete the registration process.<br><br>
        <a href='$url'>$url</a>";

        require 'core/mailer.php';
        Mailer::sendMail($this->email, $subject, $content);

    }

    public static function getToken($hash=null) {
        return sha1( $hash ?? date('ymdhi') );
    }
}
?>