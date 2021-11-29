<?php include('app.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="css/style.css" />
  <title>Login</title>
</head>

<body>
  <div class="mt-5">
    <div class="d-flex justify-content-center align-items-center">
      <form class="col-3" style="min-width: 300px" action="loginprocess.php">
        <h3 class="text-white text-center" id="login">Login</h3>
        <input type="username" id="username" placeholder="Username" class="form-control mb-2">
        <input type="password" id="password" placeholder="Password" class="form-control mb-2">
        <a href="#" class="gray_on_hover">Forgot Password?</a>
        <div class="d-flex justify-content-center align-items-center mt-3">
          <input class="btn btn-dark" type="submit"></input>
        </div>
      </form>
    </div>
  </div>
</body>

</html>