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
    if (isset($_POST['forum']) && isset($_POST['title']) && isset($_POST['desc'])) {
        include "db_connect.php";

        $forum = $_POST['forum'];
        $title = $_POST['title'];
        $desc = $_POST['desc'];

        if ($error) {
        exit(json_encode([
            'status' => 'db_error',
            'message' => 'Something went wrong, please try again',
        ]));
        }
        else{

            $sql = "SELECT id FROM forums WHERE name LIKE'".$forum."';";
            $results = mysqli_query($connection, $sql);
            $row = mysqli_fetch_assoc($results);
            $forumID = $row['id'];
            mysqli_free_result($results);
            $userID = $_SESSION['user'];
          
            $sql2 = "INSERT INTO posts (forum_id, user_id, title, description) VALUES ('".$forumID."','".$userID."','".$title."','".$desc."');";
            $results2 = mysqli_query($connection, $sql2);
            if (!$results2) {
                // Send error message back to AJAX in JSON format
                echo json_encode(array(
                    'status' => 'insert_error',
                    'message' => 'Something went wrong, please try again',
                  ));
              }
              else{
                echo json_encode(array(
                    'status' => 'success',
                    'message' => 'Post created successfully!',
                  ));
              }
            
            mysqli_close($connection);
        }
        
        
    }
    else{
        echo json_encode([
            "status" => "empty_error",
            "message" => "Please ensure Forum, Title, and Description are filled out"
          ]);
    }

}


?>