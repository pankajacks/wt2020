<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Math</title>
</head>
<body>
    <form action="index.php" method="get">
        Get Product by ID: <input type="text" name="a" value="<?php echo $_REQUEST['a'] ?? ""; ?>"><br>
        <input type="submit" value="Get Product">
    </form>
    <?php
        if (isset($_REQUEST['a'])) {
            require "ProductClass.php";
            $product = new Product();
            $p = $product->getDataAt($_REQUEST['a']) ?? "{No Data: invalid product id}";

            echo "<h1>Product Name is $p</h1>";
        }
    ?>
</body>
</html>