<?php
        $dbhost = 'localhost'; 
        $dbuser = 'kylperry';
        $dbpwd  = 'whisks farrowing sontag'; 
        $dbname = 'kylperry_3_db';
        $link = mysqli_connect($dbhost, $dbuser, $dbpwd, $dbname);
        if (!$link) { die('Connect Error (' . mysqli_connect_errno() . ') '. mysqli_connect_error()); }
    ?>