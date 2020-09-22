<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link rel="stylesheet" href="style/style.css">
</head>
<body>
    <div class="container">
        <div class='head'>Sign-up Form</div>
        <?php
        if (isset($data['error'],$data['msg'])) {
            echo "<div class='" . (
            $data['error'] ? 'fail' : 'success' ) .
            "'>$data[msg]</div>";
        }
        ?>
        <form action="?req=reg" method="post" autocomplete="off">
            <div class="inp_div">
                <label for="name"> Name:</label>
                <input type="text" name="name" required>
            </div>

            <div class="inp_div">
                <label for="email"> Email:</label>
                <input type="email" name="email" required>
            </div>

            <div class="inp_div">
                <label for="uname"> Username:</label>
                <input type="text" name="username" required>
            </div>

            <div class="inp_div">
                <label for="pwd"> Password:</label>
                <input type="password" name="password" required>
            </div>

            <div class="inp_div">
                <label for="rpwd"> Re-Enter:</label>
                <input type="password" name="rpassword" required>
            </div>

            <div style="text-align:center;">
                <p>Already registered? Sign-in 
                    <a href="?req=signin" style="text-decoration:none">here</a>
                </p>
                <button type="submit">Sign Up</button>
            </div>
            
        </form>
    </div>
</body>
</html>