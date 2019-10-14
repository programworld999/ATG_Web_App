<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sarfaraz";

// Create connection
try {
    $dbcon = new PDO("mysql:host=$servername;dbname=sarfaraz", $username, $password);
    // set the PDO error mode to exception
    $dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Connected successfully pdo";
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
?>