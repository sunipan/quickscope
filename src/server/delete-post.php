<?php
if ($_SERVER['REQUEST_METHOD'] != 'POST') {
  exit(json_encode(['status' => 'error', 'message' => 'Invalid request method']));
}
if (!isset($_POST['post_id'])) {
  exit(json_encode(['status' => 'error', 'message' => 'Empty post id']));
}
require('db_connect.php');
if ($error) {
  exit(json_encode(['status' => 'error', 'message' => $error]));
}
$post_id = $_POST['post_id'];
$result = mysqli_query($connection, "DELETE FROM posts WHERE id = $post_id");
if (!$result) {
  exit(json_encode(['status' => 'error', 'message' => 'Error deleting post']));
}
mysqli_close($connection);
exit(json_encode(['status' => 'success', 'message' => 'Post deleted']));
