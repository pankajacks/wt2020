<?php
include_once "config.php";
include "core/Database.php";
include "core/Student.php";

use Core\Data\Database;
use Core\Data\Student;

header('Content-type: application/json');

$db = new Database();
$student = new Student($db->connect());

$stmt = $student->getRecords();
$row_count = $stmt->rowCount();

if ($row_count > 0) {
    $student_arr = array(
        "records" => array()
    );

    while($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
        $student_arr['records'][] = $row;
    }

    echo json_encode($student_arr);
}

$prn = $_GET['prn'];

$stmt = $student->getStudentByPrn($prn);
$row = $stmt->fetch(\PDO::FETCH_ASSOC);

echo json_encode($row);

?>