<?php 

include('app.php');

$type = $_SERVER['REQUEST_METHOD'];


echo
'<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <link rel="stylesheet" href="css/style.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.1/font/bootstrap-icons.css">
  <title>Quickscope - Forum For LEETS</title>
</head>';


if($type != 'POST'){
  echo
  '<body>
    <br><br>

    <div class="container mt-5 pt-5" align ="center">
        <h1 class="text-white">Data must be sent as POST!</h1>
        <div class="m-3">
          <a href="sign_up.php" class="gray_on_hover">Back to sign up page</a>
        </div>
    </div>
  </body>';
}
else{

  if (isset($_POST['email']) && isset($_POST['username']) && isset($_POST['password'])){

  $email = $_POST['email'];
  $username = $_POST['username'];
  $passwordHash = password_hash($_POST['password'], PASSWORD_DEFAULT);

  $host = "localhost";    
  $database = "quickscope";        
  $user = "root";           //will probably have to change on your machine
  $password = "";   

  $connection = mysqli_connect($host, $user, $password, $database);
  $error = mysqli_connect_error();

  if($error != null)
  {
    echo
    '<body>
      <br><br>
  
      <div class="container mt-5 pt-5" align ="center">
          <h3 class="text-white">Unable to connect to database!</h3>
          <div class="m-3">
            <a href="sign_up.php" class="gray_on_hover">Back to sign up page</a>
          </div>
      </div>
    </body>';
  }
  else{

    $sql = "SELECT * FROM users WHERE username LIKE '".$username."' OR email LIKE '".$email."';";
    $results = mysqli_query($connection, $sql);
    $row = mysqli_fetch_assoc($results);

    if($row != null){
      echo
      '<body>
      <br><br>
      <div class="container mt-5 pt-5" align ="center">
          <h3 class="text-white">Username or Email already exists!</h3>
          <div class="m-3">
            <a href="sign_up.php" class="gray_on_hover">Back to sign up page</a>
        </div>
      </div>
    </body>';
  }
  else{

    $sql2 = "INSERT INTO users (email, username, password) VALUES('".$email."','".$username."','".$passwordHash."');";
    $results2 = mysqli_query($connection, $sql2);
    echo
    '<body>
    <br><br>
    <div class="container mt-5 pt-5 col-lg-4" align ="center">
        <h3 class="text-white">Account created successfully!</h3>
        <div class="d-flex justify-content-between">
            <a href="home.php" class="gray_on_hover m-4">Home</a>
            <a href="my-profile.php" class="gray_on_hover m-4">My Account</a>
        </div>
    </div>
  </body>';

  }


  mysqli_free_result($results);
  mysqli_close($connection);

  }
  
  }
}

 echo 
'
</html>';




?>