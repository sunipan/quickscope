<?php
if ($_SERVER['REQUEST_METHOD'] != 'GET') {
  exit(json_encode(['status' => 'error', 'message' => 'Invalid request method']));
}

if (!isset($_GET['search'])) {
  exit(json_encode(['status' => 'error', 'message' => 'Invalid request']));
}
$search = $_GET['search'];

require('db_connect.php');
if ($error) {
  exit(json_encode(['status' => 'error', 'message' => $error]));
}
$user = mysqli_query(
  $connection,
  "SELECT id, username, email FROM users WHERE isAdmin = 0 AND (username = '$search' OR email = '$search')"
);
if (!$user) {
  mysqli_close($connection);
  exit(json_encode(['status' => 'error1', 'message' => 'Database query error']));
}
$user = mysqli_fetch_assoc($user);
if (!$user) {
  mysqli_close($connection);
  exit(json_encode(['status' => 'error2', 'message' => 'User not found']));
}
if (empty($user)) {
  // Get user account from post instead
  $userByPost = mysqli_query(
    $connection,
    "SELECT user_id FROM posts WHERE user_name = '$search' OR title LIKE '%$search%' LIMIT 1"
  );
  if (!$userByPost) {
    mysqli_close($connection);
    exit(json_encode(['status' => 'error2', 'message' => 'Database query error']));
  }
  $userByPost = mysqli_fetch_assoc($userByPost);
  $user = mysqli_query(
    $connection,
    "SELECT id, username, email FROM users WHERE isAdmin = 0 AND id = '{$userByPost['user_id']}'"
  );
  if (!$user) {
    mysqli_close($connection);
    exit(json_encode(['status' => 'error3', 'message' => 'Database query error']));
  }
  $user = mysqli_fetch_assoc($user);
  if (empty($user)) {
    mysqli_close($connection);
    exit(json_encode(['status' => 'error4', 'message' => 'User not found']));
  }
  // Get user's posts
  $posts = mysqli_query(
    $connection,
    "SELECT id, title, user_id FROM posts WHERE user_id = '{$user['id']}'"
  );
  if (!$posts) {
    mysqli_close($connection);
    exit(json_encode(['status' => 'error4', 'message' => 'Database query error']));
  }
  $posts = mysqli_fetch_all($posts, MYSQLI_ASSOC);
  // Get user's comments
  $comments = mysqli_query(
    $connection,
    "SELECT id, post_id, user_id, comment FROM comments WHERE user_id = '{$user['id']}'"
  );
  if (!$comments) {
    mysqli_close($connection);
    exit(json_encode(['status' => 'error5', 'message' => 'Database query error']));
  }
  $comments = mysqli_fetch_all($comments, MYSQLI_ASSOC);
  mysqli_close($connection);
  exit(json_encode([
    'status' => 'success',
    'user' => $user,
    'posts' => $posts,
    'comments' => $comments
  ]));
}
// Get user's posts
$posts = mysqli_query(
  $connection,
  "SELECT id, title, user_id, user_name FROM posts WHERE user_id = '{$user['id']}'"
);
if (!$posts) {
  mysqli_close($connection);
  exit(json_encode(['status' => 'error6', 'message' => 'Database query error']));
}
$posts = mysqli_fetch_all($posts, MYSQLI_ASSOC);
// Get user's comments
$comments = mysqli_query(
  $connection,
  "SELECT id, post_id, user_name, user_id, comment FROM comments WHERE user_id = '{$user['id']}'"
);
if (!$comments) {
  mysqli_close($connection);
  exit(json_encode(['status' => 'error7', 'message' => 'Database query error']));
}
$comments = mysqli_fetch_all($comments, MYSQLI_ASSOC);
mysqli_close($connection);
exit(json_encode([
  'status' => 'success',
  'user' => $user,
  'posts' => $posts,
  'comments' => $comments
]));
