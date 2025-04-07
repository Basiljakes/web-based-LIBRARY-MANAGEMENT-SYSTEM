<?php
 $db = mysqli_connect
 ("localhost","root","","library"); 
 /* this is the order for creating mysqli_connect... server name, username, password, database name */
    if(!$db)
    {
        die("Connection failed: " . mysqli_connect_error());
    }
    else
    {
        echo "WOW! Connection successful";
    }

?>