<?php
session_start();
require_once('./db_connect.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT admin_id, name, password FROM admin WHERE email = '$email'"; 
    $result = $connection->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $name = $row['name'];
        $stored_password = $row['password'];

        // Confronta le password
        if ($password === $stored_password) {
            $_SESSION['name'] = $name;
            $_SESSION['admin_id'] = $row['admin_id']; 
            header('Location: ./admin.php');
            exit();
        } else {
            echo "<script>alert('Email o password errati');</script>";
        }
    } else {
        echo "<script>alert('Email o password errati');</script>";
        header("Location: ../reserved-area.html");
        exit();
    }
}
?>
