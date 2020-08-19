<?php
header("Content-Type: application/json");
$arr1 = array(
    array("Name"=>"ABC","Rollno"=>121,"PRN"=>898981),
    array("Name"=>"XYZ","Rollno"=>122,"PRN"=>898982),
    array("Name"=>"PQR","Rollno"=>123,"PRN"=>898983),
    array("Name"=>"UVW","Rollno"=>124,"PRN"=>898984),
    array("Name"=>"LMN","Rollno"=>125,"PRN"=>898985),
    array("Name"=>"CDE","Rollno"=>126,"PRN"=>898986)
);

$response = ["Status"=>"Fail","Data"=>""];
// $prn = isset($_GET['PRN']) ? $_GET['PRN'] : null;
$prn = $_GET['PRN'] ?? null;

$res = null;

if ($prn === null) {
    $response['Status'] = "Fail";
    $response['Data'] = "Invalid request";
    echo json_encode($response);
    return;
}

foreach($arr1 as $data) {

    if ($data["PRN"] == $prn) {
        $res = $data;
        break;
    }

}
if ($res) {
    $response["Status"]  = "Succes";
    $response["Data"] = $res;
}

echo json_encode($response);


?>