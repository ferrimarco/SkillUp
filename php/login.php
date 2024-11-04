<?php
session_start();
require_once("./db_connect.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $signIN_email = $_POST["login-email"]; 
    $signIN_password = $_POST["login-password"];

    $sql = "SELECT user_id, username, password FROM user WHERE email = '$signIN_email'";
    $result = $connection->query($sql);

    if ($result->num_rows > 0) {

        $row = $result->fetch_assoc();
        $username = $row['username'];
        $stored_password = $row['password']; 

        if ($signIN_password === $stored_password) {
            $_SESSION['username'] = $username;
            $_SESSION['user_id'] = $row['user_id']; 
            header('Location: ./user.php');
            exit();
        } else {
            echo "<script>alert('Email o password errati');</script>";
        }
    } else {
        echo "<script>alert('Email o password errati');</script>";
        header("Location: ../login.html");
        exit();
    }
}
?>
