<?php
function success_upload($message)
{
    header("Location: ../index.php?my_variable=" . urlencode($message));
    $pathFileLogs = "../logs/logs_upload.txt";
    $textLogs = $message . " " . date("Y-m-d h:i:s", time()) . "\n";
    $openFileLogs = fopen($pathFileLogs, 'a+');
    fwrite($openFileLogs, $textLogs);
    fclose($openFileLogs);
    exit();
}
function break_upload($message)
{
    header("Location: ../index.php?my_variable=" . urlencode($message));
    $pathFileLogs = "../logs/logs_upload.txt";
    $textLogs = $message . " " . date("Y-m-d h:i:s", time()) . "\n";
    $openFileLogs = fopen($pathFileLogs, 'a+');
    fwrite($openFileLogs, $textLogs);
    fclose($openFileLogs);
    exit();
}

function file_not_uploaded($message)
{
    header("Location: ../index.php?my_variable=" . urlencode($message));
    $pathFileLogs = "../logs/logs_upload.txt";
    $textLogs = $message . " " . date("Y-m-d h:i:s", time()) . "\n";
    $openFileLogs = fopen($pathFileLogs, 'a+');
    fwrite($openFileLogs, $textLogs);
    fclose($openFileLogs);
    exit();
}

function format_not_allowed($message)
{
    header("Location: ../index.php?my_variable=" . urlencode($message));
    $pathFileLogs = "../logs/logs_upload.txt";
    $textLogs = $message . " " . date("Y-m-d h:i:s", time()) . "\n";
    $openFileLogs = fopen($pathFileLogs, 'a+');
    fwrite($openFileLogs, $textLogs);
    fclose($openFileLogs);
    exit();
}

function break_login($message)
{
    header("Location: ../index.php?my_variable=" . urlencode($message));
    $pathFileLogs = "../logs/logs_login.txt";
    $textLogs = $message . " " . date("Y-m-d h:i:s", time()) . "\n";
    $openFileLogs = fopen($pathFileLogs, 'a+');
    fwrite($openFileLogs, $textLogs);
    fclose($openFileLogs);
    exit();
}

function registr_failed($message)
{
    header("Location: ../index.php?my_variable=" . urlencode($message));
    $pathFileLogs = "../logs/logs_login.txt";
    $textLogs = $message . " " . date("Y-m-d h:i:s", time()) . "\n";
    $openFileLogs = fopen($pathFileLogs, 'a+');
    fwrite($openFileLogs, $textLogs);
    fclose($openFileLogs);
    exit();
}