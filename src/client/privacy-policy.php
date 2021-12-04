<?php $title = "Privacy Policy | Quickscope 🎯";
require('components/head.php');
require('components/header.php');
?>

<div class="container-fluid post-container">
  <div class="row">
    
    <div class="col-lg-7 offset-lg-1">
      <div class="h2 text-white">
        Privacy Policy
      </div>
      <div class="card col-lg-12 mb-2">
      <div class="h3 card-body mb-3">
        Effetive December 8, 2021. Last revised December 4, 2021.
      </div>
      
      <div class="h5 card-body mb-3">
        To create an account at Quickscope, you will be required to provide us with an email, password, and username.
        A profile picture is optional. Your email and password are private. Your username and profile picture will be public to other users.
        Your username and profile picture does not have to be associated with you whatsoever.
      </div>
      <div class="h5  card-body mb-3">
        Your user information is stored in our database. Actions you take, such as creating forums, posts, and leaving comments will all be collected.
      </div>
      <div class="h5 card-body mb-3">
        In order to keep your data secure, we encrypt password information into our database.
        A unique reset token will be generated when executing a password reset, to ensure security.
      </div>
    </div>
    </div>
    <!-- Recent posts card -->
    <div class="col-3 d-none d-lg-block">
      <div class="h2" style="visibility:hidden">placeholder</div>
      <div class="card mb-3">
        <div class="card-body">
          <h5 class="card-title">Recent Posts</h5>
          <ul class="list-group list-group-flush recent-list">
            <?php include('../server/get_recent_forums.php'); ?>
        </div>
      </div>
      <!-- Create a forum card -->
      <div class="card mb-3">
        <div class="card-body">
          <h5 class="card-title">Join or Create Your Own Community!</h5>
          <div class="post-forum-buttons d-flex flex-column">
            <a href="create-post.php" class="btn btn-primary mb-3">Create a Post</a>
            <a href="create-forum.php" class="btn btn-danger">Create a Forum</a>
          </div>
        </div>
      </div>
      <div class="card about-us-home mb-3">
        <div class="card-body">
          <h5 class="card-title">Quickscope Information</h5>
          <div class="row">
            <a class="col text-decoration-none text-secondary" href="about-us.php">
              <p class="font-title-12 mt-3">About Us</p>
            </a>
            <a class="col text-decoration-none text-secondary" href="privacy-policy.php">
              <p class="font-title-12 mt-3">Privacy Policy</p>
            </a>
          </div>
          <div class="row">
            <a class="col text-decoration-none text-secondary" href="terms.php">
              <p class="font-title-12">Terms</p>
            </a>
            <a class="col text-decoration-none text-secondary" href="contact-us.php">
              <p class="font-title-12">Contact</p>
            </a>
          </div>
          <div class="row">
            <a class="col text-decoration-none text-secondary" href="all-forums.php">
              <p class="font-title-12">All Forums</p>
            </a>
            <a class="col text-decoration-none text-secondary" href="https://www.youtube.com/watch?v=Udvwea3YzZA">
              <p class="font-title-12">Our Origins</p>
            </a>
          </div>
        </div>
      </div>
  </div>
</div>