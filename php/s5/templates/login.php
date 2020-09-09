
<form action="?req=auth" method="post">
    <table border="1">
        <tr>
            <td>Username</td>
            <td>
                <input type="text" name = "username">
            </td>
        </tr>
        <tr>
            <td>Password</td>
            <td>
                <input type="password" name = "password">
            </td>
        </tr>
        <tr>
            <td colspan="2" align="center">
                <input type="submit" value = "Login">
            </td>
        </tr>
    </table>
    <?php
        if ($msg != "   ") {
            echo "<div style='color:red'><h3>$msg</h3></div>";
        }
    ?>
</form>
