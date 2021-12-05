<?php
$host = "localhost";
$database = "db_34671552";
$user = "34671552";
$password = "34671552";

$connection = mysqli_connect($host, $user, $password, $database);

$error = mysqli_connect_error();

// Don't forget to close the connection!