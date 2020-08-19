<!-- 
    JSON stands for JavaScript Object Notation, 
    and is a syntax for storing and exchanging data.

    PHP has some built-in functions to handle JSON.
    - json_encode(): encode an associative array into a JSON object
    - json_decode(): decode a JSON object into a PHP object or an associative array.
 -->

<?php
$age = array("Peter"=>35, "Ben"=>37, "Joe"=>43);
$jsonobj = json_encode($age);
// $jsonobj = '{"Peter":35,"Ben":37,"Joe":43}';

$obj = json_decode($jsonobj, true); //array with true; without true PHP object
var_dump($obj);
echo $obj['Peter'];
