<?php
session_start();
$type = $_SERVER['REQUEST_METHOD'];
if ($type != 'POST') {
    // Send error message back to AJAX in JSON format
    echo json_encode(array(
      'status' => 'request_error',
      'message' => 'Invalid request method'
    ));
  }
else{
    if (isset($_POST['postTitle'])) {
        $postTitle = $_POST['postTitle'];
        

        include('db_connect.php');

        if ($error) {
            // Send error message back to AJAX in JSON format
            exit(json_encode(array(
              'status' => 'db_error',
              'message' => 'Something went wrong, please try again',
            )));
        } 
        else{
            
            $sql2 = "SELECT name FROM forums WHERE name LIKE '".$postTitle."';";
            $results2 = mysqli_query($connection, $sql2);
            $row2 = mysqli_fetch_assoc($results2);
            if($row2 != null){
                echo json_encode(array(
                    'status' => 'already_exist',
                    'message' => 'Forum name already exists!',
                  ));
                  mysqli_free_result($results2);
            }

            else{

            mysqli_free_result($results2);

            $sql = "INSERT INTO forums (name, user_id) VALUES ('" . $postTitle . "', (SELECT id FROM users WHERE id LIKE '".$_SESSION['user']."'));";
            $results = mysqli_query($connection, $sql);

            if (!$results) {
                // Send error message back to AJAX in JSON format
                echo json_encode(array(
                    'status' => 'insert_error',
                    'message' => 'Something went wrong, please try again',
                  ));
              }
              else{
                echo json_encode(array(
                    'status' => 'success',
                    'message' => 'Forum created successfully!',
                  ));
              }
            }
            //mysqli_free_result($results);
        }
}
    
    mysqli_close($connection);
}


?>