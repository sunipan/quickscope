<?php
if ($_SERVER['REQUEST_METHOD'] != 'POST') {
  exit(json_encode(['status' => 'error', 'message' => 'Invalid request method']));
}
if (!isset($_POST['forum_id'])) {
  exit(json_encode(['status' => 'error', 'message' => 'Empty forum id']));
}
// Initialize db
require('db_connect.php');
if ($error) {
  exit(json_encode(['status' => 'error', 'message' => $error]));
}

// To delete a forum, we must delete all comments and posts associated with it

// Fetch posts ID's of posts from forum being deleted
$posts_query = mysqli_query($connection, "SELECT id FROM posts WHERE forum_id = $_POST[forum_id]");
if (!$posts_query) {
  exit(json_encode(['status' => 'error', 'message' => 'Error fetching posts']));
}
$posts = mysqli_fetch_all($posts_query, MYSQLI_ASSOC);

// Fetch comment ID's of comments from posts being deleted
$comments = mysqli_query(
  $connection,
  "SELECT id FROM comments WHERE post_id IN (SELECT id FROM posts WHERE forum_id = $_POST[forum_id])"
);
if (!$comments) {
  exit(json_encode(['status' => 'error', 'message' => 'Error fetching comments']));
}
$comments = mysqli_fetch_all($comments, MYSQLI_ASSOC);

// Delete comments
$result = mysqli_query(
  $connection,
  "DELETE FROM comments WHERE post_id IN (SELECT id FROM posts WHERE forum_id = $_POST[forum_id]);"
);
if (!$result) {
  mysqli_close($connection);
  exit(json_encode([
    'status' => 'error',
    'message' => 'Error deleting comments',
  ]));
}

// Delete posts
$result = mysqli_query($connection, "DELETE FROM posts WHERE forum_id = $_POST[forum_id]");
if (!$result) {
  mysqli_close($connection);
  exit(json_encode(['status' => 'error', 'message' => 'Error Deleting Posts']));
}

// Delete forum
$result = mysqli_query($connection, "DELETE FROM forums WHERE id = $_POST[forum_id]");
if (!$result) {
  mysqli_close($connection);
  exit(json_encode(['status' => 'error', 'message' => 'Error Deleting Forum']));
}

mysqli_close($connection);
exit(json_encode([
  'status' => 'success',
  'message' => 'Forum Deleted',
  'posts' => $posts,
  'comments' => $comments
]));
