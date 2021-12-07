<?php
if ($_SERVER['REQUEST_METHOD'] != 'GET') {
  exit(json_encode(['status' => 'error', 'message' => 'Invalid request method']));
}

if (!isset($_GET['mainSearch'])) {
  exit(json_encode(['status' => 'error', 'message' => 'Invalid request']));
}

$mainSearch = $_GET['mainSearch'];

require('db_connect.php');

if ($error) {
  exit(json_encode(['status' => 'error', 'message' => $error]));
}


$forums = mysqli_fetch_all(mysqli_query($connection, "SELECT * FROM forums WHERE name LIKE '%$mainSearch%'"), MYSQLI_ASSOC);

$posts = mysqli_fetch_all(mysqli_query($connection, "SELECT * FROM posts WHERE title LIKE '%$mainSearch%'"), MYSQLI_ASSOC);


if (!$forums && !$posts) {
  mysqli_close($connection);
  exit(json_encode(
    [
      'status' => 'error2',
      'message' => 'No forums or posts found'
    ]
  ));
} else {
  mysqli_close($connection);
  exit(json_encode(
    [
      'status' => 'success',
      'forums' => $forums,
      'posts' => $posts
    ]
  ));
}
