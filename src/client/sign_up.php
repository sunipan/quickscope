<?php $title = "Sign Up | Quickscope 🎯";
require('components/head.php');
require('components/header.php');
?>

<div class="mt-5">
  <div class="d-flex justify-content-center align-items-center">
    <form class="col-3 form-container">
      <h1 class="h3 text-white text-center" id="sign_up">Create Account</h1>
      <input type="email" id="create_email" placeholder="Email" class="form-control mb-2" required>
      <input type="text" id="create_username" placeholder="Username" class="form-control mb-2" required>
      <input class="form-control mb-2" placeholder="Password" type="password" id="create_pass" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}">
      <input class="form-control mb-2" placeholder="Confirm Password" type="password" id="create_pass_confirm" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}">
      <div id="pass_validation" class="flex-column rounded-2 bg-white ps-3 py-2">
        <strong>Password must contain the following:</strong>
        <p id="letter" class="text-red mb-1">A <b>lowercase</b> letter</p>
        <p id="capital" class="text-red mb-1">A <b>capital (uppercase)</b> letter</p>
        <p id="number" class="text-red mb-1">A <b>number</b></p>
        <p id="length" class="text-red mb-1">Minimum <b>8 characters</b></p>
        <p id="match" class="text-red mb-1">Passwords must <b>match</b></p>
      </div>
      <a href="login.php" class="gray_on_hover">Already have an account?</a>
      <button id="sign_up_submit" class="btn btn-dark w-100 mt-3">Sign Up</button>
      <button id="test_submit" class="btn btn-dark w-100 mt-2">Test</button>
      <div class="alert alert-danger text-center mt-2" role="alert" id="sign_up_feedback"></div>
    </form>
  </div>
</div>

<?php $scripts = ['js/custom.js'];
require('components/scripts.php'); ?>