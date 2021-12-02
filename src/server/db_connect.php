<?php
// Need this so invalid DB connection doesn't break the feedback to user
// COMMENT OUT WHEN TESTING AJAX REQUESTS TO SEE ERRORS
error_reporting(0);
$host = "localhost";
$database = "quickscope";
$user = "root";           //will probably have to change on your machine
$password = "";

$connection = mysqli_connect($host, $user, $password, $database);

$error = mysqli_connect_error();

// Don't forget to close the connection!