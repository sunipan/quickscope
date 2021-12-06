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
// Get forum of post being deleted to decrement its post count
$forum_id = mysqli_query($connection, "SELECT forum_id FROM posts WHERE id = $post_id");
if (!$forum_id) {
  mysqli_close($connection);
  exit(json_encode(['status' => 'error', 'message' => 'Error while fetching forum id']));
}
$forum_id = mysqli_fetch_assoc($forum_id)['forum_id'];

// Get comment ID's for removing elements in admin panel
$comment_ids = mysqli_query($connection, "SELECT id FROM comments WHERE post_id = $post_id");
if (!$comment_ids) {
  mysqli_close($connection);
  exit(json_encode(['status' => 'error', 'message' => 'Error while fetching comment ids']));
}
// Fetch comments to send back
$comments = mysqli_fetch_all($comment_ids, MYSQLI_ASSOC);

// Delete comments
$result = mysqli_query($connection, "DELETE FROM comments WHERE post_id = $post_id");
if (!$result) {
  mysqli_close($connection);
  exit(json_encode(['status' => 'error', 'message' => 'Error while deleting comments']));
}
// Delete post
$result = mysqli_query($connection, "DELETE FROM posts WHERE id = $post_id");
if (!$result) {
  mysqli_close($connection);
  exit(json_encode(['status' => 'error', 'message' => 'Error deleting post']));
}

// Decrement forum post count, after successful deletion
$result = mysqli_query($connection, "UPDATE forums SET post_count = post_count-1 WHERE id = $forum_id");
if (!$result) {
  mysqli_close($connection);
  exit(json_encode(['status' => 'error', 'message' => 'Error updating forum post count']));
}

mysqli_close($connection);
exit(json_encode([
  'status' => 'success',
  'message' => 'Post deleted',
  'comments' => $comments
]));
