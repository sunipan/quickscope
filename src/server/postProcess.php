<?php
session_start();
if (!$_SESSION['isAble']) {
  exit(json_encode([
    'status' => 'error',
    'message' => 'Your account is disabled.'
  ]));
}
if ($_SERVER['REQUEST_METHOD'] != 'POST') {
  // Send error message back to AJAX in JSON format
  echo json_encode(array(
    'status' => 'request_error',
    'message' => 'Invalid request method'
  ));
} else {
  $uniqueDir = '';
  if (isset($_POST['forum']) && isset($_POST['title']) && isset($_POST['desc'])) {
    if (isset($_FILES['post_img'])) {
      $target_file = "posts/" . basename($_FILES["post_img"]["name"]);
      $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
      $uniqueDir = "../server/posts/" . time() . uniqid(rand()) . "." . $imageFileType;
      // Check if image file is a actual image or fake image
      $check = getimagesize($_FILES["post_img"]["tmp_name"]);
      if (!$check)
        exit(json_encode(['status' => 'image_error', 'message' => "File is not an image."]));
      // Check file size
      if ($_FILES["post_img"]["size"] > 1000000) {
        exit(json_encode(['status' => 'file_size_error', 'message' => 'Sorry, your file is too large.']));
      }
      // Allow certain file formats
      if (
        $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif"
      ) {
        exit(json_encode(['status' => 'image_error', 'message' => "Sorry, only JPG, JPEG, PNG & GIF files are allowed."]));
      }
      // if everything is ok, try to upload file
      if (!move_uploaded_file($_FILES["post_img"]["tmp_name"], $uniqueDir)) {
        exit(json_encode(['status' => 'upload_error', 'message' => 'Error uploading file']));
      }
    }
    // Connect to database
    include "db_connect.php";

    $forum = $_POST['forum'];
    $title = $_POST['title'];
    $desc = $_POST['desc'];


    if ($error) {
      exit(json_encode([
        'status' => 'db_error',
        'message' => 'Something went wrong, please try again',
      ]));
    } else {
      $result = mysqli_query($connection, "SELECT username FROM users WHERE id = {$_SESSION['user']}");
      if (!$result) {
        exit(json_encode([
          'status' => 'db_error',
          'message' => 'Something went wrong, please try again',
        ]));
      } else {
        $row = mysqli_fetch_assoc($result);
      }
      // Insert post into database
      $sql = "INSERT INTO posts (forum_id, user_id, user_name, title, description, image) VALUES ('$forum','{$_SESSION['user']}','{$row['username']}', '$title','$desc', '$uniqueDir');";
      $result = mysqli_query($connection, $sql);

      if (!$result) {
        exit(json_encode([
          'status' => 'db_error',
          'message' => 'Something went wrong, please try again',
        ]));
      } else {
        $postId = mysqli_insert_id($connection);

        $result = mysqli_query($connection, "UPDATE forums SET post_count = post_count + 1 WHERE id = $forum;");
        if (!$result) {
          // Send error message back to AJAX in JSON format
          echo json_encode(array(
            'status' => 'update_error',
            'message' => 'Something went wrong, please try again',
          ));
        } else {
          // Send success message back to AJAX in JSON format
          echo json_encode(array(
            'status' => 'success',
            'message' => 'Post successfully created',
            'id' => $postId,
          ));
        }
      }
      mysqli_close($connection);
    }
  } else {
    echo json_encode([
      "status" => "empty_error",
      "message" => "Please ensure Forum, Title, and Description are filled out"
    ]);
  }
}
