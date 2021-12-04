<?php $title = "Terms of Service | Quickscope 🎯";
require('components/head.php');
require('components/header.php');
?>

<div class="container-fluid post-container">
  <div class="row">
    
    <div class="col-lg-7 offset-lg-1">
      <div class="h2 text-white">
        Terms of Service
      </div>
      <div class="card col-lg-12 mb-2">
        <div class="h3 card-body">
            Effetive December 8, 2021. Last revised December 4, 2021.
        </div>
        <div class="h4 card-body mb-3">
            1. Privacy
        </div>
        <div class="h5 card-body mb-3">
            Our <a href="privacy-policy.php">Privacy Policy</a> states the information we use, and the security measures taken.
        </div>
        <div class="h4 card-body mb-3">
            2. Your Content
        </div>
        <div class="h5 card-body mb-3">
            When you create new content, you grant Quickscope the ability to access, edit, modify, and delete your content.
        </div>
        <div class="h4 card-body mb-3">
            3. Things You Cannot Do
        </div>
        <div class="h5 card-body mb-3">
            When using Quickscope, you may not do any of the following:
            <ul>
                <li class="m-2">Upload any malicious content with intent to harm the software</li>
                <li class="m-2">Gain unauthorized access to administrator's profile, or any other user profile</li>
                <li class="m-2">Upload any illegal content</li>
            </ul>
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
</div>