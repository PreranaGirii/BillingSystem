<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Page Title</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <script src='main.js'></script>
</head>

<body>
    <?php
    $hostname = "localhost";
    $username = "root";
    $password = "";
   

    $conn = mysqli_connect($hostname, $username, $password);

    if (!$conn) {
        die("Couldnot connect" . mysqli_connect_error());
    } else
        echo "Connection successful"; 

    $sql = "CREATE DATABASE department";

    $result = mysqli_query($conn, $sql);

    if (!$result) {
        die("Couldnot create database." . mysqli_error($conn));
    } else {
        echo "Database created.";
    }
    ?>