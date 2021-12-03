<?php
include "db_connect.php";
if ($error) {
  exit(json_encode([
    'status' => 'db_error',
    'message' => 'Something went wrong, please try again',
  ]));
}

$username = $_POST['username'];
$password = $_POST['password'];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  if (isset($_POST['username']) && isset($_POST['password'])) {
    $sql = "SELECT id, avatarType, password FROM users WHERE username='$username'";
    $results = mysqli_query($connection, $sql);
    if ($row = mysqli_fetch_assoc($results)) {
      if (password_verify($password, $row['password'])) {
        session_start();
        // Set session variables
        $_SESSION['user'] = $row['id'];
        $_SESSION['avatarType'] = $row['avatarType'];
        echo json_encode([
          'status' => 'success',
          ]);
          mysqli_free_result($results2);
        }
        
      } else {
        echo json_encode([
          "status" => "input_error",
          "message" => "Username and/or password are invalid"
        ]);
      }
    } else {
      echo json_encode([
        "status" => "exists_error",
        "message" => "Username does not exist"
      ]);
    }
    mysqli_free_result($results);
    mysqli_close($connection);
  } else {
    echo json_encode([
      "status" => "empty_error",
      "message" => "Please enter a username and password"
    ]);
  }
} else {
  echo json_encode([
    "status" => "request_error",
    "message" => "invalid request",
  ]);
}
