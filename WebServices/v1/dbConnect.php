<?php
$username = 'root';
$password = '';
$db = 'dbprix';
$servername = 'localhost';
$port = 3306;
try {
    $conn= new PDO("mysql:host=$servername;dbname=dbprix", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Connected successfully";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
  return $conn;