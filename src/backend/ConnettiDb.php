<?php
    $host = "localhost";
    $port = '5432';
    $db_name = "GRUPPO05";
    $user = "www";
    $password = "tw2024";
    $connection_string = "host=$host dbname=$db_name user=$user password=$password";
    $db_connection = pg_connect($connection_string) or die('Impossibile connettersi al database<br>' . pg_last_error());
?>