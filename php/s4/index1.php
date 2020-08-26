<?php
require 'connection.php';

$sql = "SELECT * FROM newstudent ORDER BY prn";
$stmt = $conn->prepare($sql);
$stmt->execute();

$student_arr = array();
$student_arr['records'] = array();

if ($stmt->rowCount() > 0) {
    while($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
        array_push($student_arr['records'],$row);
    }
}
echo json_encode($student_arr);

// echo "<table border=1>";
// echo "<tr><th>Sr. No</th><th>Name</th></tr>";
// if ($stmt->rowCount() > 0) {
//     $i = 1;
//     while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
//         echo "<tr><td>$i</td>";
//         echo "<td>".($row['fname'] . " " . $row['lname'])."</td>";
//         $i++;
//     }
// }



// echo "</table>";
?>