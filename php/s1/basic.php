<?php
    $title =  "My PHP Example";
    $name = array('Ravi','Amit','Rohan','Rajesh');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title ?></title>
</head>
<body>
    <h1>Name List</h1>
    <table>
        <tr><th>Name</th></tr>
        <?php for ($i=0; $i < count($name); $i++) { ?>
        <tr><td> <?php echo "<h2>$name[$i]</h2>" ?> </td></tr>
        <?php } ?>
    </table>
</body>
</html>
