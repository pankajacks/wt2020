<?php
include_once "../config.php";
include "../core/Database.php";
include "../core/Student.php";

use Core\Data\Database;
use Core\Data\Student;

header('Content-type: application/json');

$db = new Database();
$student = new Student($db->connect());

$student->prn = $_POST['prn'] ?? null;
$student->fname = $_POST['fname'] ?? null;
$student->lname = $_POST['lname'] ?? null;
$student->rollno = $_POST['rollno'] ?? null;
$student->email = $_POST['email'] ?? null;
$student->mobile = $_POST['mobile'] ?? null;

$response = array(
    "status" => "Failed",
    "message" => "Error in updating teh  record"
);

if ( $student->update() > 0 ) {
    $response['status'] = "Success";
    $response['message'] = "Record Updated";
}

echo json_encode($response);




?>