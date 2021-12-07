<?php



if ($_SERVER['REQUEST_METHOD']!='GET'){
    exit(json_encode([
        'status' => 'request_error',
        'message' => 'Something went wrong, please try again',
      ]));
}

include "db_connect.php";
if ($error) {
  exit(json_encode([
    'status' => 'db_error',
    'message' => 'Something went wrong, please try again',
  ]));
}

$result= mysqli_query($connection, "SELECT isAdmin FROM users WHERE id='$_SESSION[user]'");
if(!$result){
    exit(json_encode([
        'status' => 'db_error',
        'message' => 'Something went wrong, please try again',
        ]));
}
$result= mysqli_fetch_assoc($result);

if($result==0){
    exit(json_encode([
        'status' => 'user_error',
        'message' => 'User is not admin',
        ]));
}


$num = $_GET['num'];

if($num==1){
    $result= mysqli_query($connection, "SELECT id FROM users LIMIT 5");
    if(!$result){
        exit(json_encode([
            'status' => 'db_error',
            'message' => 'Something went wrong, please try again',
          ]));
    }

    $result= mysqli_fetch_all($result, MYSQLI_ASSOC);
    mysqli_close($connection);
    exit(json_encode($result));

}
else if($num==2){
    $result= mysqli_query($connection, "SELECT id FROM posts LIMIT 5");
    if(!$result){
        exit(json_encode([
            'status' => 'db_error',
            'message' => 'Something went wrong, please try again',
          ]));
    }

    $result= mysqli_fetch_all($result, MYSQLI_ASSOC);
    mysqli_close($connection);
    exit(json_encode($result));

}else if($num==3){
    $result= mysqli_query($connection, "SELECT id FROM forums LIMIT 5");
    if(!$result){
        exit(json_encode([
            'status' => 'db_error',
            'message' => 'Something went wrong, please try again',
          ]));
    }

    $result= mysqli_fetch_all($result, MYSQLI_ASSOC);
    mysqli_close($connection);
    exit(json_encode($result));

}else if($num==4){
    $result= mysqli_query($connection, "SELECT id FROM comments LIMIT 5");
    if(!$result){
        exit(json_encode([
            'status' => 'db_error',
            'message' => 'Something went wrong, please try again',
          ]));
    }

    $result= mysqli_fetch_all($result, MYSQLI_ASSOC);
    mysqli_close($connection);
    exit(json_encode($result));

}

