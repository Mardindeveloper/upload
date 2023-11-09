<?php
$host = 'localhost';
$dbname = 'upload';
$username = 'root';
$password = '';
$dns="mysql:host=$host;dbname=$dbname";

try {
    $db = new PDO($dns, $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error: " . $e->getMessage());
}
?>
