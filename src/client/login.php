<?php include('app.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/style.css" />
  <script src="js/custom.js"></script>
  <title>Login</title>
</head>

<body>
  <div class="mt-5">
    <div class="d-flex justify-content-center align-items-center">
      <div class="col-3" style="min-width: 300px">
        <h3 class="text-white text-center" id="login">Login</h3>
        <input type="username" name="username" id="login_username" placeholder="Username" class="form-control mb-2">
        <input type="password" name="password" id="login_password" placeholder="Password" class="form-control mb-2">
        <div class="d-flex justify-content-between">
          <a href="forgot_pass.php" class="gray_on_hover">Forgot Password?</a>
          <a href="sign_up.php" class="gray_on_hover">Sign up now!</a>
        </div>
        <div class="d-flex justify-content-center align-items-center mt-3">
          <input id="login-button" class="btn btn-dark" type="submit"></input>
        </div>
        <div class="alert alert-danger text-center mt-2" role="alert" id="login_feedback"></div>
      </div>
    </div>
</body>

</html>