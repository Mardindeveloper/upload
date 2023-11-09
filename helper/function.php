<?php
function success_upload()
{
    $my_variable = "File upload was successful";
    header("Location: ../index.php?my_variable=" . urlencode($my_variable));
    exit();
}
function break_upload()
{
    $my_variable = "File upload failed";
    header("Location: ../index.php?my_variable=" . urlencode($my_variable));
    exit();
}

function file_not_uploaded()
{
    $my_variable = "File not uploaded";
    header("Location: ../index.php?my_variable=" . urlencode($my_variable));
    exit();
}

function format_not_allowed()
{
    $my_variable = "File format not allowed!";
    header("Location: ../index.php?my_variable=" . urlencode($my_variable));
    exit();
}

function break_login()
{
    $my_variable = "The username or password is incorrect";
    header("Location: login.php?my_variable=" . urlencode($my_variable));
    exit();
}