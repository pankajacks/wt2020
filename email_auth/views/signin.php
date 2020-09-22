<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign-in</title>
    <link rel="stylesheet" href="style/style.css">
</head>
<body>
    <div class="container">
        <div class='head'>Sign In</div>
        <?php
        if (isset($data['error'],$data['msg'])) {
            echo "<div class='" . (
            $data['error'] ? 'fail' : 'success' ) .
            "'>$data[msg]</div>";
        }
        ?>
        <form action="?req=auth" method="post" autocomplete="off">

            <div class="inp_div">
                <label for="email"> Email:</label>
                <input type="email" name="email" placeholder="Enter Email ID" required>
            </div>

            <div class="inp_div">
                <label for="pwd"> Password:</label>
                <input type="password" name="password" placeholder="Enter Your Password" required>
            </div>

            <div style="text-align:center;">
                <p>Don't have an account? Sign-up 
                    <a href="?req=signup" style="text-decoration:none">here</a>
                </p>
                <button type="submit">Login</button>
            </div>
            
        </form>

    </div>
</body>
</html>