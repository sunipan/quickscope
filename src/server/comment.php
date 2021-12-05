<?php
session_start();
if (!$_SESSION['isAble']) {
  exit(json_encode([
    'status' => 'error',
    'message' => 'Your account is disabled.'
  ]));
}
if ($_SERVER['REQUEST_METHOD'] != 'POST')
  exit(json_encode(['status' => 'request_error', 'message' => 'Request method must be POST!']));
if (!$_POST['comment'] && !$_POST['post_id'])
  exit(json_encode(['status' => 'input_error', 'message' => 'Comment cannot be empty!']));

$comment = $_POST['comment'];

require('db_connect.php');
if ($error)
  exit(json_encode(['status' => 'db_error1', 'message' => 'Something went wrong, please try again']));
try {
  $user = mysqli_fetch_assoc(mysqli_query($connection, "SELECT avatar, username FROM users WHERE id = '{$_SESSION['user']}'"));
} catch (Exception $e) {
  mysqli_close($connection);
  exit(json_encode(['status' => 'db_error2', 'message' => 'Something went wrong, please try again']));
}
$result = mysqli_query($connection, "INSERT INTO comments (comment, post_id, user_id, user_name, user_avatar) VALUES ('" . mysqli_real_escape_string($connection, $comment) . "', '$_POST[post_id]', $_SESSION[user], '$user[username]', '$user[avatar]')");
if (!$result) {
  echo (json_encode(['status' => 'db_error3', 'message' => mysqli_error($connection)]));
  mysqli_close($connection);
  exit;
}
$result = mysqli_query($connection, "UPDATE posts SET comment_count = comment_count + 1 WHERE id = '$_POST[post_id]'");
if (!$result) {
  mysqli_close($connection);
  exit(json_encode(['status' => 'db_error4', 'message' => 'Something went wrong, please try again']));
}
mysqli_close($connection);
exit(json_encode([
  'status' => 'success',
  'message' => 'Comment added successfully!',
  'comment' => $comment,
  'avatar' => $user['avatar'],
  'username' => $user['username']
]));
