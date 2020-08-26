<?php
require 'connection.php';

$prn = $_GET['prn'];

$sql = "SELECT * FROM newstudent WHERE prn like :prn ORDER BY prn";
$stmt = $conn->prepare($sql);
$stmt->bindParam(":prn",$prn);
$stmt->execute();
$row = $stmt->fetch(\PDO::FETCH_ASSOC);

echo json_encode($row);

?>