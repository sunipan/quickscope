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
      <div class="col-3 form-container">
        <h3 class="text-white text-center" id="login">Login</h3>
        <input type="username" id="login_username" placeholder="Username" class="form-control mb-2">
        <input type="password" id="login_password" placeholder="Password" class="form-control mb-2">
        <div class="d-flex justify-content-between">
          <a href="sign_up.php" class="gray_on_hover">Don't have an accout? Sign up now!</a>
        </div>
        <button id="login-button" class="btn btn-dark w-100 mt-3">Login</button>
        <div class="alert alert-danger text-center mt-2" role="alert" id="login_feedback"></div>
      </div>
    </div>
</body>

</html>