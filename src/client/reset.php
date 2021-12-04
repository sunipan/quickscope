<?php
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
  $error = "Invalid request method";
}
if (!isset($_GET['token']) || !isset($_GET['email'])) {
  $error = "Invalid credentials";
}
require('../server/db_connect.php');
if ($error)
  die($error);
$token = $_GET['token'];
$email = $_GET['email'];

$result = mysqli_query($connection, "SELECT id FROM users WHERE email='$email' AND reset_token='$token'");
if (!$result)
  die(mysqli_error($connection));

if (mysqli_num_rows($result) == 1) {
} else {
  $error = "Invalid credentials";
}
$title = "Reset Password | Quickscope 🎯";
require('components/head.php');
require('components/header.php');
?>

<div class="mt-5">
  <div class="d-flex justify-content-center align-items-center">
    <form class="col-3 form-container">
      <h3 class="text-white text-center" id="login">Reset Password</h3>
      <input type="password" id="new_pass" placeholder="New Password" class="form-control mb-2">
      <input type="password" id="new_pass_confirm" placeholder="Confirm Password" class="form-control mb-2">
      <div id="pass_validation" class="flex-column rounded-2 bg-white ps-3 py-2 d-hide">
        <strong>Password must contain the following:</strong>
        <p id="letter" class="text-red mb-1">A <b>lowercase</b> letter</p>
        <p id="capital" class="text-red mb-1">A <b>capital (uppercase)</b> letter</p>
        <p id="number" class="text-red mb-1">A <b>number</b></p>
        <p id="length" class="text-red mb-1">Minimum <b>8 characters</b></p>
        <p id="match" class="text-red mb-1">Passwords must <b>match</b></p>
      </div>
      <button id="reset-button" class="btn btn-dark w-100 mt-3">Reset</button>
      <div class="alert alert-success text-center mt-2 d-hide" role="alert" id="reset_success"></div>
      <div class="alert alert-danger text-center mt-2 d-hide" role="alert" id="reset_error"></div>
    </form>
  </div>
</div>

<?php $scripts = ['js/custom.js'];
require('components/scripts.php'); ?>