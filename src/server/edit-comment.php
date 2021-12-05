<?php
if ($_SERVER['REQUEST_METHOD'] != 'POST') {
  exit(json_encode(['status' => 'error', 'message' => 'Invalid request method']));
}
if (!isset($_POST['comment_id']) || !isset($_POST['comment'])) {
  exit(json_encode(['status' => 'error', 'message' => 'Empty ID or text']));
}
require('db_connect.php');
if ($error) {
  exit(json_encode(['status' => 'error', 'message' => $error]));
}
$comment_id = $_POST['comment_id'];
$comment = $_POST['comment'];
$result = mysqli_query(
  $connection,
  "UPDATE comments SET comment = '" . mysqli_real_escape_string($connection, $comment) . "' WHERE id = '$comment_id'"
);
if (!$result) {
  echo (json_encode(['status' => 'error', 'message' => mysqli_error($connection)]));
  mysqli_close($connection);
}
mysqli_close($connection);
exit(json_encode(['status' => 'success', 'message' => 'Comment updated']));
