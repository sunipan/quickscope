<?php
session_start();
if (!$_SESSION['isAble']) {
  exit(json_encode([
    'status' => 'error',
    'message' => 'Your account is disabled.'
  ]));
}
$type = $_SERVER['REQUEST_METHOD'];
if ($type != 'POST') {
  // Send error message back to AJAX in JSON format
  echo json_encode(array(
    'status' => 'request_error',
    'message' => 'Invalid request method'
  ));
} else {
  if (isset($_POST['forumTitle'])) {
    $forumTitle = $_POST['forumTitle'];


    include('db_connect.php');

    if ($error) {
      // Send error message back to AJAX in JSON format
      exit(json_encode(array(
        'status' => 'db_error',
        'message' => 'Something went wrong, please try again',
      )));
    } else {
      $results = mysqli_query($connection, "SELECT name FROM forums WHERE name = '$forumTitle'");
      if (!$result) {
        mysqli_close($connection);
        exit(json_encode(array(
          'status' => 'db_error',
          'message' => 'Something went wrong, please try again',
        )));
      }
      $row = mysqli_fetch_assoc($results);
      if ($row != null) {
        mysqli_close($connection);
        exit(json_encode(array(
          'status' => 'already_exist',
          'message' => 'Forum name already exists!',
        )));
      } else {
        $sql = "INSERT INTO forums (name, user_id) VALUES ('$forumTitle', {$_SESSION['user']});";
        $results = mysqli_query($connection, $sql);

        if (!$results) {
          // Send error message back to AJAX in JSON format
          echo json_encode(array(
            'status' => 'insert_error',
            'message' => 'Something went wrong, please try againfasdfa',
          ));
        } else {
          echo json_encode(array(
            'status' => 'success',
            'message' => 'Forum created successfully!',
            'id' => mysqli_insert_id($connection),
          ));
        }
      }
    }
  }

  mysqli_close($connection);
}
