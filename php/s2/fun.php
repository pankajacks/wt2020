<?php
declare(strict_types=1);

function functionName() {
    echo "This is a function\n";
}

function abc($str) {
    echo $str;
}


function division(int $a, int $b) {
    return intVal($a/$b);
}

// functionName();
// abc("Hello function");

echo division(9,2);
?>