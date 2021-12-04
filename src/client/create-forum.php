<?php
if (isset($_SESSION['user'])) {
  header("Location: login.php");
}
$title = "Create Forum | Quickscope 🎯";
require('components/head.php');
require('components/header.php');
?>

<div class="mt-5">
  <div class="d-flex justify-content-center align-items-center">
    <form class="col-3 form-container">
      <h3 class="text-white text-center" id="login">Create Forum</h3>
      <input type="text" id="forumTitle" placeholder="Forum Title" class="form-control mb-2">
      <div class="form-check">
        <input class="form-check-input" type="checkbox" id="confirm-forum">
        <label class="form-check-label text-white" for="confirm-forum">
          I confirm the creation of this forum
        </label>
      </div>
      <button id="forum-button" class="btn btn-dark w-100 mt-3">Create</button>
      <div class="alert alert-danger text-center mt-2" role="alert" id="forum_error"></div>
      <div class="alert alert-success text-center mt-2" role="alert" id="forum_success"></div>
    </form>
  </div>
</div>

<?php $scripts = ['js/custom.js'];
require('components/scripts.php'); ?>