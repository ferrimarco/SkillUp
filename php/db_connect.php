<?php
    
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "skillup_db";

    $connection = new mysqli($servername, $username, $password, $dbname);
    if($connection->connect_error){
        die("Connessione al database fallita..!");
    }
?>