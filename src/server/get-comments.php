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
try {
  $results = mysqli_fetch_all(mysqli_query(
    $connection,
    "SELECT id, user_avatar, user_name, comment FROM comments WHERE post_id = $post_id;",
  ), MYSQLI_ASSOC);
  $comment_array = [];
  foreach ($results as $result) {
    $comment_array[] = $result['id'];
  }
} catch (Exception $e) {
  exit(json_encode(['status' => 'error', 'message' => $e->getMessage()]));
}
if (empty($results)) {
  exit(json_encode(['status' => 'error', 'message' => 'No comments found']));
}

$diff;
$comment_diff = [];
// Diff current array against DB array
if (count($results) > count($comments)) {
  $diff = array_diff($comment_array, $comments);
  foreach ($diff as $id) {
    $comment_diff[] = $results[intval($id - 1)];
  }
}
// Send back diff comments to append to current page without refreshing
exit(json_encode(['status' => 'success', 'comments' => $comment_diff]));
