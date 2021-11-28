<?php include('app.php'); ?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/style.css" />
  <script src="js/custom.js"></script>
  <title>Login</title>

  <style>
    #createAcc {
      margin-top: 10em;
    }
  </style>

</head>

<body>


  <div class="mt-5">
    <div class="text-center">
      <form action="createAccprocess.php" style="max-width:300px;margin:auto;">
        <h1 class="h3 text-white" id="createAcc">Create Account</h1>
        <input type="email" placeholder="Email" class="form-control mb-2">
        <input type="username" placeholder="Username" class="form-control mb-2">
        <input type="password" placeholder="Password" class="form-control mb-2">
        <div class="mt-3">
          <input class="btn btn-dark" type="submit"></input>
        </div>
      </form>
    </div>
  </div>


</body>

</html>