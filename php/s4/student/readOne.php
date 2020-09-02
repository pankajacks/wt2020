<?php
include_once "../config.php";
include "../core/Database.php";
include "../core/Student.php";

use Core\Data\Database;
use Core\Data\Student;

header('Content-type: application/json');

$db = new Database();
$student = new Student($db->connect());

$stmt = $student->getRecords();

$row = array();

if (isset($_GET['prn'])) {

    $student->prn = $_GET['prn'];
    $stmt = $student->getStudentByPrn();
    $row = $stmt->fetch(\PDO::FETCH_ASSOC);

}

echo json_encode($row);

?>