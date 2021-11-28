<?php include('app.php'); ?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="css/style.css" />
  <title>Login</title>


  <style>
    a,
    h1 {
      color: white;
    }

    #login {
      margin-top: 10em;
    }
  </style>

</head>

<body>
  <div class="mt-5">
    <div class="d-flex justify-content-center align-items-center">
      <form class="col-3" style="max-width: 300px" action="loginprocess.php">
        <h1 class="h3" id="login">Login</h1>
        <input type="username" id="username" placeholder="Username" class="form-control mb-2">
        <input type="password" id="password" placeholder="Password" class="form-control mb-2">
        <a href="#">Forgot Password?</a>
        <div class="d-flex justify-content-center align-items-center mt-3">
          <input class="btn btn-dark" type="submit"></input>
        </div>
      </form>
    </div>
  </div>

</body>

</html>