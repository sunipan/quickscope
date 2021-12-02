<?php $title = "My Profile | Quickscope 🎯";
// Restrict access to logged in users
require('components/head.php');
if (!isset($_SESSION['user'])) {
  header('Location: login.php');
}
require('components/header.php'); ?>

<div class="container-fluid post-container">
  <div class="card col-md-8 m-auto px-5 pb-3">
    <div class="row d-flex justify-content-center align-items-center">
      <div class="col-md-4 offset-md-1 mt-2">
        <h4 class='text-black'>My Profile</h4>
        <figure>
          <img class="rounded-circle border border-3 border-danger" src='img/default_profile_pic.png' height='100px' width='100px'>
        </figure>
      </div>
      <div class="col-md-7">
        <h5 class="text-black profile_user fw-bold">Username:</h5>
        <h5 class="profile_user">sample_user
          <a class="text-dark text-decoration-none" href="profile-edit.php">
            <i class="bi bi-pencil-square"></i>
          </a>
        </h5>
        </a>
        <h5 class='text-black fw-bold profile_email'>Email:</h5>
        <h5 class="profile_email">sample@email.com <a class="text-dark" href="profile-edit.php">
            <i class="bi bi-pencil-square"></i>
          </a>
        </h5>
      </div>
    </div>
    <hr class="mt-0 mb-2">
    <div class="row">
      <div class="col-md-4 offset-md-1 mt-2">
        <h4 class='text-black'>My Posts</h4>
      </div>
    </div>
    <?php for ($i = 0; $i < 5; $i++) {
      echo '<div class="row">
      <div class="col-md-10 offset-md-1">
        <h6 class="text-dark d-flex">Post Title lorem ipsum dolor sit amet, consectetur adipisicing elit. lorem ips
          <a class="text-dark ms-2" href="post-detail.php">
            <h5><i class="bi bi-pencil-square"></i></h5>
          </a>
        </h6>
      </div>
    </div>';
      if ($i < 4)
        echo '<hr class="mt-0 mb-2">';
    } ?>
  </div>

  <?php include('components/scripts.php'); ?>