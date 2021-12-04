<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] != 'POST') {
  exit(json_encode(['status' => 'error', 'message' => 'Invalid request method']));
}
if (!isset($_POST['password']) || !isset($_POST['password_confirm']) || !isset($_POST['token']) || !isset($_POST['email'])) {
  exit(json_encode(['status' => 'error', 'message' => 'Invalid request']));
}
if ($_POST['password'] != $_POST['password_confirm']) {
  exit(json_encode(['status' => 'error', 'message' => 'Passwords do not match']));
}
require('db_connect.php');
$password = $_POST['password'];
$password = password_hash($password, PASSWORD_DEFAULT);
$sql = "UPDATE users SET password = '$password', reset_token = NULL WHERE reset_token = '{$_POST['token']}' AND email = '{$_POST['email']}'";
$result = mysqli_query($connection, $sql);
if (!$result) {
  exit(json_encode(['status' => 'db_error', 'message' => 'Something went wrong, please try again']));
}
if (mysqli_affected_rows($connection) == 1) {
  mysqli_close($connection);
  session_destroy();
  exit(json_encode(['status' => 'success', 'message' => 'Password Updated, please wait while we redirect you to the login page']));
} else {
  mysqli_close($connection);
  session_destroy();
  exit(json_encode(['status' => 'token_error', 'message' => 'Invalid reset link, please try resetting password again']));
}
