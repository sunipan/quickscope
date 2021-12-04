<?php
$title = "Forgot Password | Quickscope 🎯";
require('components/head.php');
require('components/header.php');
?>

<div class="mt-5">
  <div class="d-flex flex-column justify-content-center align-items-center">
    <form class="col-3 form-container">
      <h3 class="text-white text-center" id="forgot">Forgot Password</h3>
      <div class="form-group">
        <input type="email" class="form-control" id="forgot_email" placeholder="Email">
      </div>
      <button id="forgot-button" class="btn btn-dark w-100 mt-2">Send Verification Email</button>
      <div class="alert alert-danger text-center mt-2" role="alert" id="forgot_error"></div>
      <div class="alert alert-success text-center mt-2" role="alert" id="forgot_success"></div>
    </form>
  </div>
</div>

<?php $scripts = ['js/custom.js'];
require('components/scripts.php'); ?>