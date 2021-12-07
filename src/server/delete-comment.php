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
// Get post_id of comment
$result = mysqli_query($connection, "SELECT post_id FROM comments WHERE id = $_POST[comment_id]");
if (!$result) {
  mysqli_close($connection);
  exit(json_encode(['status' => 'error', 'message' => mysqli_error($conn)]));
}
$post = mysqli_fetch_assoc($result)['post_id'];
$comment_id = $_POST['comment_id'];
$result = mysqli_query($connection, "DELETE FROM comments WHERE id = $comment_id");
if (!$result) {
  mysqli_close($connection);
  exit(json_encode(['status' => 'error', 'message' => 'Error deleting comment']));
}
$result = mysqli_query(
  $connection,
  "UPDATE posts SET comment_count = comment_count - 1 WHERE id = $post"
);
if (!$result) {
  mysqli_close($connection);
  exit(json_encode(['status' => 'error', 'message' => 'Error updating comment count']));
}
mysqli_close($connection);
exit(json_encode(['status' => 'success', 'message' => 'Comment deleted']));
