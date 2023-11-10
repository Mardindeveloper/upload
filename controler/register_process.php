<?php
require '../config/config.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $result = LoginRegister($db, $first_name, $last_name, $username, $password);

    if ($result) {
        $user = GetUserID($db, $username);
        $_SESSION['username'] = $username;
        $_SESSION['id_user'] = $user['id'];
        header("Location: ../index.php");
    } else {
        registr_failed();
    }
}
$conn->close();
?>