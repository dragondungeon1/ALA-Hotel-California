<?php


session_start();

$config = [
    'dsn' => 'mysql',
    'host' => 'localhost',
    'username' => 'root',
    'password' => null
];

//$connection = new PDO();

try {
    $conn = new PDO("mysql:host=" . $config['host'] . ";dbname=hotel_cali", $config['username'], $config['password']);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//    echo "Connected successfully";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}