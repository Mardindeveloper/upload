<?php
require '../config/config.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $message;
    $username = $_POST['username'];
    $password = $_POST['password'];

    $user = Login($db, $username);
    if(!$user) {
        $message = "Username is wrong";
        break_login($message);
    }

    if (password_verify($password, $user['password'])) {
        $_SESSION['username'] = $user['username'];
        $_SESSION['id_user'] = $user['id'];
        header("Location: ../index.php");
    } else {
        $message = "Password is wrong";
        break_login($message);
    }
}
$conn->close();
?>