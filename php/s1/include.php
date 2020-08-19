<!-- 
    The include (or require) statement takes all the text/code/markup that 
    exists in the specified file and copies it into the file that uses 
    the include statement.

    It is possible to insert the content of one PHP file into another PHP file 
    (before the server executes it), with the include or require statement.

    The include and require statements are identical, except upon failure:
    -require will produce a fatal error (E_COMPILE_ERROR) and stop the script
    -include will only produce a warning (E_WARNING) and the script will continue

    
 -->

<?php
    require 'data.php';
    include 'header.php';
?>