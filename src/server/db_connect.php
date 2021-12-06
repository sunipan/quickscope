<?php
$host = "localhost";
$database = "quickscope";
$user = "root";
$password = "";

$connection = mysqli_connect($host, $user, $password, $database);

$error = mysqli_connect_error();

// Don't forget to close the connection!