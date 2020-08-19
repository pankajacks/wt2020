<?php
header("Content-type: application/json");
require 'Data.php';
// include 'Data.php';

$req = $_GET['req'] ?? null;

if ($req) {
    $jsonData = file_get_contents("data.json");
    $dataList = json_decode($jsonData, true)['student'];
    try {
        $studentData = new StudentData($dataList);
    } catch (Exception $th) {
        echo json_encode([$th->getMessage()]);
        return;
    }
}

switch ($req) {
    case 'name_list':
        echo $studentData->getStudentName();
        break;

    case "student_data":
        $prn = $_GET['prn'] ?? null;
        echo $studentData->getStudentByPrn($prn);
        break;
    
    default:
        echo json_encode(["In-valid request"]);
        break;
}

?>