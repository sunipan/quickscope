<?php
if ($_SERVER['REQUEST_METHOD'] != 'POST') {
  exit(json_encode(['status' => 'error', 'message' => 'Invalid request method']));
}
if (empty($_POST['user_id'])) {
  exit(json_encode(['status' => 'error', 'message' => $_POST['user_id']]));
}
require('db_connect.php');
if ($error) {
  exit(json_encode(['status' => 'error', 'message' => $error]));
}
$user_id = $_POST['user_id'];
$result = mysqli_query($connection, "UPDATE users SET isAble = 0 WHERE id = $user_id");
if (!$result) {
  echo (json_encode(['status' => 'error', 'message' => mysqli_error($connection)]));
  mysqli_close($connection);
  exit;
}
exit(json_encode(['status' => 'success', 'message' => 'User Disabled']));
