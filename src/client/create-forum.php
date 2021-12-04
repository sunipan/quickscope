<?php $title = "Create Forum | Quickscope 🎯";
require('components/head.php');
require('components/header.php');
// Send user to login if not logged in
if (!isset($_SESSION['user'])) {
  header('Location: login.php');
}
?>
<div class="container mt-5 pt-5" align="center">
  <h1 class="text-white">Create Forum</h1>
</div>
<div class="container-fluid">
  <div class="col-lg-10 offset-lg-1">
    <div class="card-body">

      <div class="p-1 col-lg-6 offset-lg-3" align="center">
        <input type="text" class="form-control" id="postTitle" placeholder="Title" required>
      </div>
      <br>
      <div class="p-1 col-lg-6 offset-lg-3" align="center">
        <input type="checkbox" id="confirm" name="confirm" value="true" required>
        <label for="confirm" class="text-white">I confirm the creation of this forum</label>
      </div>
      <br>
      <div class="p-2" align="center">
        <button id="forumButton" class="btn btn-dark">Create</button>
        <div class="alert alert-danger text-center mt-2 col-lg-4" role="alert" id="login_feedback"></div>
      </div>



    </div>
  </div>
</div>

<?php $scripts = ['js/custom.js'];
require('components/scripts.php'); ?>