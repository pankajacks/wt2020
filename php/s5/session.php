<?php
session_start();

    $a = $_SESSION['a'] ?? 10;
    $a += 1;
    $_SESSION['a'] = $a;
    echo $a;
?>