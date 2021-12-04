<?php $title = "My Profile | Quickscope 🎯";
// Restrict access to logged in users
require('components/head.php');
if (!isset($_SESSION['user'])) {
  header('Location: login.php');
}
require('components/header.php');
require('../server/db_connect.php');
if ($error)
  exit($error);

$sql = "SELECT username, email, avatar FROM users WHERE id = {$_SESSION['user']}";
$result = mysqli_query($connection, $sql);

if ($row = mysqli_fetch_assoc($result)) {
  $username = $row['username'];
  $email = $row['email'];
  $avatar = $row['avatar'];
}
$sql2 = "SELECT * FROM forums WHERE user_id =" . $_SESSION['user'] . ";";
$forums = mysqli_fetch_all(mysqli_query($connection, $sql2), MYSQLI_ASSOC);
//mysqli_close($connection);
?>

<div class="container-fluid post-container">
  <div class="card col-lg-8 m-auto px-5 pb-3">
    <div id="edit_success" class="alert alert-success text-center mt-2" role="alert" style="display: none;"></div>
    <div id="edit_error" class="alert alert-danger text-center mt-2" role="alert" style="display: none;"></div>
    <div class="row d-flex justify-content-center align-items-center">
      <div class="col-lg-4 offset-lg-1 mt-2">
        <h4 class='text-black'>My Profile</h4>
        <figure id="profile-figure">
          <?php
          echo '<img class="rounded-circle border border-3 border-danger" src="' . $_SESSION['avatar'] . '" height="100px" width="100px">';
          ?>
        </figure>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-danger mb-2" data-bs-toggle="modal" data-bs-target="#editModal">
          Edit Profile
        </button>
      </div>
      <div class="col-lg-7">
        <h5 class="text-black profile_user fw-bold">Username:</h5>
        <h5 id="username_text" class="profile_user"><?php echo $username ?></h5>
        </a>
        <h5 class='text-black fw-bold profile_email'>Email:</h5>
        <h5 id="email_text" class="profile_email"><?php echo $email ?></h5>
      </div>
    </div>
    <hr class="my-2">
    <div class="row col-lg-10 offset-lg-1 py-2">
      <div class="col-lg-8 px-0">
        <select class="form-select border border-1 border-secondary" name="forumList" id="forumList">
          <option value="" disabled selected>Select a Created Forum</option>
          <?php foreach ($forums as $forum) {
            echo '<option value="' . $forum['id'] . '">' . $forum['name'] . '</option>';
          } ?>
        </select>
      </div>
      <div class="col-lg-4 mt-2 mt-lg-0 d-flex justify-content-end px-0">
        <button class="btn btn-dark" id="forumLink" disabled>Go to Forum</button>
      </div>
    </div>
    <div class="col-lg-10 offset-lg-1 mt-2">
      <h4 class='text-black'>My Posts <small class="fs-6 fw-light fst-italic"> - Click to visit your posts</small></h4>
    </div>
    <ul class="ps-0 list-group col-lg-10 offset-lg-1">
      <?php

      $sql3 = "SELECT * FROM posts WHERE user_id =" . $_SESSION['user'] . ";";
      $posts = mysqli_fetch_all(mysqli_query($connection, $sql3), MYSQLI_ASSOC);
      mysqli_close($connection);

      foreach ($posts as $post) {
        echo '<a href="post.php?id=' . $post["id"] . '" class="row d-flex justify-content-start list-group-item">
                <h6 class="col-9 text-dark my-2">' . $post["title"] . '</h6>
              </a>';
      } ?>
    </ul>

    <!-- Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Profile</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form id="edit_form" method="post" action="" enctype="multipart/form-data">
              <div class="form-group">
                <label for="edit_email">Email Address</label>
                <input type="email" class="form-control" id="edit_email" aria-describedby="emailHelp" placeholder="Change Email">
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
              </div>
              <div class="form-group">
                <label for="edit_username">Username</label>
                <input type="text" class="form-control" id="edit_username" aria-describedby="emailHelp" placeholder="Change Username">
              </div>
              <div class="form-group">
                <label for="edit_profile">Profile Picture</label>
                <input type="file" class="form-control" id="edit_profile_pic" accept="image/png, image/jpeg, image/jpg, image/gif">
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" id="edit_submit" class="btn btn-primary">Save changes</button>
          </div>
        </div>
      </div>
    </div>
  </div>

  <?php $scripts = ['js/custom.js'];
  include('components/scripts.php'); ?>