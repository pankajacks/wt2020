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

if ($stmt->rowCount() > 0) {
    $student_arr = array(
        "records" => array()
    );

    while($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
        $student_arr['records'][] = $row;
    }

    echo json_encode($student_arr);
}
?>