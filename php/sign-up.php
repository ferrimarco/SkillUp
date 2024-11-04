<?php

session_start();
require_once("./db_connect.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $name = $_POST["name"];
    $surname = $_POST["surname"];
    $signUP_email = $_POST["email"];
    $signuUP_password = $_POST["password"];

    $sql = "INSERT INTO user (username, name, surname, email, password) VALUES ('$username', '$name', '$surname', '$signUP_email', '$signuUP_password')";
    if ($connection->query($sql)) {
        echo "<script>alert('Registrazione effettuata con successo');</script>";
        $_SESSION['username'] = $username;
        header('Location: ./user.php');
        exit();
    } else {
        echo "<script>alert('Errore durante la registrazione: " . $connection->error . "');</script>";
    }
}

?>