<?php
if ($_SERVER['REQUEST_METHOD'] != 'GET') {
  exit(json_encode(['status' => 'error', 'message' => 'Invalid request']));
}
if (!isset($_GET['post_id']) || !isset($_GET['comments'])) {
  exit(json_encode(['status' => 'error', 'message' => 'Empty Inputs']));
}
$post_id = $_GET['post_id'];
$comments = $_GET['comments'];

require('db_connect.php');
if ($error) {
  exit(json_encode(['status' => 'error', 'message' => $error]));
}
$results = mysqli_query($connection, "SELECT comment_count FROM posts WHERE id = $post_id");
if (!$results) {
  mysqli_close($connection);
  exit(json_encode(['status' => 'error', 'message' => 'Error fetching comments']));
}
$results = mysqli_fetch_assoc($results);
$comment_count = $results['comment_count'];

$results = mysqli_query(
  $connection,
  "SELECT user_avatar, user_name, comment FROM comments WHERE post_id = $post_id",
);
if (!$results) {
  mysqli_close($connection);
  exit(json_encode(['status' => 'error', 'message' => 'Error fetching comments']));
} else {
  $results = mysqli_fetch_all($results, MYSQLI_ASSOC);
}
if (empty($results)) {
  mysqli_close($connection);
  exit(json_encode(['status' => 'error', 'message' => 'No comments found']));
}

$diff = $comment_count - $comments;
if ($diff > 0) {
  $results = array_splice($results, $comments, $diff);
  mysqli_close($connection);
  exit(json_encode(['status' => 'success', 'comments' => $results]));
} else {
  mysqli_close($connection);
  exit(json_encode(['status' => 'error', 'message' => 'No new comments']));
}
