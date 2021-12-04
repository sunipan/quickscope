<?php $title = "Create Post | Quickscope 🎯";
require('components/head.php');
if (!isset($_SESSION['user'])) {
  header('Location: login.php');
}
require('components/header.php');
require('../server/db_connect.php');
if ($error)
  die($error);
$forums = mysqli_fetch_all(mysqli_query($connection, "SELECT * FROM forums"), MYSQLI_ASSOC);
mysqli_close($connection);
?>

<div class="container-fluid post-container">
  <div class="col-lg-10 m-auto">
    <div class="h2 text-white pt-5 mt-5">Create Post</div>
    <div id="post-card" class="card col-lg-12">
      <div class="card-body">
        <div class="col-lg-12 mb-1">
          <select class="form-select border border-1 border-secondary" name="forum" id="forum">
            <option value="" disabled selected>Post to a Forum!</option>
            <?php foreach ($forums as $forum) {
              echo '<option value="' . $forum['id'] . '">' . $forum['name'] . '</option>';
            } ?>
          </select>
        </div>
        <div class="col-lg-12 mb-1">
          <input type="text" class="form-control border border-1 border-secondary" id="postTitle" placeholder="Title">
        </div>
        <div class="col-lg-12">
          <textarea class="form-control border border-1 border-secondary" id="postDesc" placeholder="Description (Optional)" rows="12"></textarea>
        </div>
        <div class="form-group d-flex flex-column flex-sm-row justify-content-between">
          <div>
            <label class="text-dark mt-3" for="edit_profile">Upload Image</label>
            <input type="file" class="form-control border border-1 border-secondary" id="postImage" accept="image/png, image/jpeg, image/jpg, image/gif">
          </div>
          <button class="btn btn-dark h-50 align-self-end mt-2 mt-sm-0" id="postButton">Submit</button>
        </div>
        <div class="offset-lg-10">
        </div>
        <div class="alert alert-danger text-center mt-2 col-lg-4 offset-lg-4 d-hide" role="alert" id="post_error"></div>
        <div class="alert alert-success text-center mt-2 col-lg-4 offset-lg-4 d-hide" role="alert" id="post_success">
          <a href="#" class="btn btn-dark w-100 mt-3" id="goto-post">Visit your new Post!</a>
        </div>
      </div>
    </div>
  </div>
</div>

<?php
$scripts = ['js/custom.js'];
require('components/scripts.php'); ?>