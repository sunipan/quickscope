<?php
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../../');
$dotenv->load();

$host = $_ENV['DB_HOST'];
$database = $_ENV['DB_DATABASE'];
$user = $_ENV['DB_USER'];
$password = $_ENV['DB_PASSWORD'];

$connection = mysqli_connect($host, $user, $password, $database);

$error = mysqli_connect_error();

// Don't forget to close the connection!