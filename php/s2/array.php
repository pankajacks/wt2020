<?php
header("Content-Type: application/json");
$arr = array("Pink");

array_pop($arr);

array_push($arr, "Blue", "Yellow");
// print_r($arr);

array_splice($arr, 1, 0, array("Red","Green"));
// print_r($arr);


$arr1 = array(
    array("Name"=>"ABC","Rollno"=>121,"PRN"=>898981),
    array("Name"=>"XYZ","Rollno"=>122,"PRN"=>898982),
    array("Name"=>"PQR","Rollno"=>123,"PRN"=>898983),
    array("Name"=>"UVW","Rollno"=>124,"PRN"=>898984),
    array("Name"=>"LMN","Rollno"=>125,"PRN"=>898985),
    array("Name"=>"CDE","Rollno"=>126,"PRN"=>898986)
)


// var_dump($arr1);

// $key = "PRN1";
// echo $arr1[$key];

// if ( array_key_exists($key,$arr1) ) {
//     echo $arr1[$key];
// } else {
//     echo "Key Does not Exists";
// }

// foreach($arr as $val) {
//     $arr1[$val] = $val;
// }

// echo "<pre>";
// print_r($arr1);
// echo "</pre>";

// echo json_encode($arr1);
// echo $arr1[$key];

// $key = $_GET['KEY'];
// $flag = "Succes";
// if ( array_key_exists($key,$arr1) ) {
//     $res  = $arr1[$key];
// } else {
//     $res = "Key Does not Exists";
//     $flag = "Fail";
// }

// echo json_encode(['Status'=>$flag, "Data"=>$res]);

// if ()

$arr1 = array(
    array("Name"=>"ABC","Rollno"=>121,"PRN"=>898981),
    array("Name"=>"XYZ","Rollno"=>122,"PRN"=>898982),
    array("Name"=>"PQR","Rollno"=>123,"PRN"=>898983),
    array("Name"=>"UVW","Rollno"=>124,"PRN"=>898984),
    array("Name"=>"LMN","Rollno"=>125,"PRN"=>898985),
    array("Name"=>"CDE","Rollno"=>126,"PRN"=>898986)
)

?>