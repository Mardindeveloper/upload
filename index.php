<?php
require 'config/db.php';
require 'view/View.php';
session_start();
if(isset($_SESSION['id_user']) and isset($_SESSION['username'])) {
    $idUser = $_SESSION['id_user'];
    $userName = $_SESSION['username'];  
    formUploader($idUser, $userName, $db);
}
if (!isset($idUser)) {
    LoginPage();
}