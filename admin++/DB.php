<?php

require_once "DB.php";
//session_start(); nog niet werken met sessies

$config = [
    'dsn' => 'mysql',
    'host' => 'localhost',
    'username' => 'root',
    'password' => null
];

//$connection = new PDO();

try {
    $conn = new PDO("mysql:host=" . $config['host'] . ";dbname=hotel_cali", $config['username'], $config['password']);
} catch (PDOException $e) {
    throw new PDOException($e->getMessage(), (int)$e->getCode());
}
require_once "functions.php";