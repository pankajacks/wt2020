
<div>
    <?php
    if (isset($_SESSION['user'])) {
        echo '<a href="?req=logout">Logout</a>';
    } else {
        echo '<a href="?req=login">Login</a>';
    }
    ?>
</div>
