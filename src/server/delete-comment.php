<?php
if ($_SERVER['REQUEST_METHOD'] != 'POST') {
  exit(json_encode(['status' => 'error', 'message' => 'Invalid request method']));
}
if (!isset($_POST['comment_id'])) {
  exit(json_encode(['status' => 'error', 'message' => 'Empty comment id']));
}
require('db_connect.php');
if ($error) {
  exit(json_encode(['status' => 'error', 'message' => $error]));
}
$comment_id = $_POST['comment_id'];
$result = mysqli_query($connection, "DELETE FROM comments WHERE id = $comment_id");
if (!$result) {
  exit(json_encode(['status' => 'error', 'message' => 'Error deleting comment']));
}
mysqli_close($connection);
exit(json_encode(['status' => 'success', 'message' => 'Comment deleted']));
