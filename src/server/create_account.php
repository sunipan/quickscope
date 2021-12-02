<?php
$type = $_SERVER['REQUEST_METHOD'];
if ($type != 'POST') {
  // Send error message back to AJAX in JSON format
  echo json_encode(array(
    'status' => 'request_error',
    'message' => 'Invalid request method'
  ));
} else {

  if (isset($_POST['email']) && isset($_POST['username']) && isset($_POST['password'])) {

    $email = $_POST['email'];
    $username = $_POST['username'];
    $passwordHash = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // Connect to database
    include('db_connect.php');

    if ($error) {
      // Send error message back to AJAX in JSON format
      exit(json_encode(array(
        'status' => 'db_error',
        'message' => 'Something went wrong, please try again',
      )));
    } else {

      $sql = "SELECT * FROM users WHERE username LIKE '" . $username . "' OR email LIKE '" . $email . "';";
      $results = mysqli_query($connection, $sql);
      $row = mysqli_fetch_assoc($results);
      if ($row) {
        // Send error message back to AJAX in JSON format
        echo json_encode(array(
          'status' => 'exists_error',
          'message' => 'Username or email already exists',
        ));
      } else {

        $sql2 = "INSERT INTO users (email, username, password) VALUES('" . $email . "','" . $username . "','" . $passwordHash . "');";
        $results2 = mysqli_query($connection, $sql2);
        // If insert failed, send back error message
        if (!$results2) {
          // Send error message back to AJAX in JSON format
          echo json_encode(array(
            'status' => 'insert_error',
            'message' => 'Something went wrong, please try again',
          ));
        } else {
          // Send success message back to AJAX in JSON format
          echo json_encode(array(
            'status' => 'success',
            'message' => 'Account created successfully',
          ));
        }
      }
    }
    mysqli_free_result($results);
    mysqli_close($connection);
  }
}
