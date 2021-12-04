<?php $title = "Login | Quickscope 🎯";
require('components/head.php');
require('components/header.php');
?>

<div class="mt-5">
  <div class="d-flex justify-content-center align-items-center">
    <form class="col-3 form-container">
      <h3 class="text-white text-center" id="login">Login</h3>
      <input type="username" id="login_username" placeholder="Username" class="form-control mb-2">
      <input type="password" id="login_password" placeholder="Password" class="form-control mb-2">
      <div class="d-flex justify-content-between">
        <a href="forgot.php" class="gray_on_hover">Forgot Password?</a>
        <a href="sign_up.php" class="gray_on_hover">Don't have an account? Sign up!</a>
      </div>
      <button id="login-button" class="btn btn-dark w-100 mt-3">Login</button>
      <div class="alert alert-danger text-center mt-2" role="alert" id="login_feedback"></div>
    </form>
  </div>
</div>

<?php $scripts = ['js/custom.js'];
require('components/scripts.php'); ?>