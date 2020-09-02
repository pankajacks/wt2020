<?php
include_once "../config.php";
include "../core/Database.php";
include "../core/Student.php";

use Core\Data\Database;
use Core\Data\Student;

header('Content-type: application/json');

$db = new Database();
$student = new Student($db->connect());

$student->prn = $_GET['prn'] ?? null;

$response = array(
    "status" => "Failed",
    "message" => "Error in deleting the  record"
);

if ( $student->delete() > 0 ) {
    $response['status'] = "Success";
    $response['message'] = "Record Deleted";
}

echo json_encode($response);

?>