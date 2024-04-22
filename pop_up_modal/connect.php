<?php
//data source name 
$host = "localhost";
$username = "root";
$password = "";
$database = "advice";


try {
    // Replace hots with host in the DSN
    $conn = new PDO("mysql:host=$host;dbname=$database;charset=utf8", $username, $password);

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed" . $e->getMessage();
    exit;
}
