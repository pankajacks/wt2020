<?php
$conn = null;

try {
    $conn = new PDO("mysql:host=localhost;dbname=student", "root", "pankaj");
} catch(PDOException $e) {
    echo "Connection Error: " . $e->getMessage();
}
?>