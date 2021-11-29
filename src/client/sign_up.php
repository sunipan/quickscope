<?php include('app.php'); ?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/style.css" />
  <script src="js/custom.js"></script>
  <title>Create Account</title>

  <style>
    #createAcc {
      margin-top: 10em;
    }
  </style>
</head>

<body>
  <div class="mt-5">
    <div class="d-flex justify-content-center align-items-center">
      <form class="col-3" action="createAccprocess.php" style="min-width:300px;">
        <h1 class="h3 text-white text-center" id="createAcc">Create Account</h1>
        <input type="email" id="create_email" placeholder="Email" class="form-control mb-2" required>
        <input type="text" id="create_username" placeholder="Username" class="form-control mb-2" required>
        <input class="form-control mb-2" placeholder="Password" type="password" id="create_pass" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
        <div id="pass_validation" class="flex-column rounded-2 bg-white ps-3">
          <strong>Password must contain the following:</strong>
          <p id="letter" class="text-red mb-1">A <b>lowercase</b> letter</p>
          <p id="capital" class="text-red mb-1">A <b>capital (uppercase)</b> letter</p>
          <p id="number" class="text-red mb-1">A <b>number</b></p>
          <p id="length" class="text-red mb-1">Minimum <b>8 characters</b></p>
        </div>
        <a href="#" class="gray_on_hover">Already have an account?</a>
        <div class="d-flex justify-content-center mt-3">
          <input id="sub" class="btn btn-dark" type="submit" value="Sign Up"></input>
        </div>
      </form>
    </div>
  </div>


</body>

</html>