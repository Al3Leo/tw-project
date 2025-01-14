<?php
    $host = "localhost";
    $port = 5432;
    $db_name = "GRUPPO05";
    $user = "www";
    $password = "tw2024";
    $connection_string = "host=$host dbname=$db_name user=$user password=$password";
pg_connect($connection_string);
?>