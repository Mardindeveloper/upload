<?php
require '../config/config.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $user = Login($db, $username);

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['username'] = $user['username'];
        $_SESSION['id_user'] = $user['id'];
        header("Location: ../index.php");
    } else {
        break_login();
    }
}
$conn->close();
?>