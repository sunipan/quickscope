<?php include('app.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <link rel="stylesheet" href="css/style.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.1/font/bootstrap-icons.css">
  <title>Quickscope - Forum For LEETS</title>
</head>

<body>
  <div class="container-fluid post-container">
    <div class="row">
      <!-- This column shows most recent post from each forum -->
      <div class="col-lg-7 offset-lg-1">
        <!-- Create fake posts by changing $i threshold -->
        <?php
        for ($i = 0; $i < 10; $i++) {
          if ($i === 0) {
            // Print the first post
            echo '<div class="card col-lg-12 mb-2">
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card\'s content.</p>
              <a href="#" class="btn btn-dark">Go somewhere</a>
            </div>
            <div class="col-10 offset-1">
              <img src="img/kermit.png" class="card-img-bottom" />
            </div>
            <div class="col-1 offset-1 comment-stuff d-flex mt-3">
              <span style="font-size: 1.25rem;" class="comment-count d-flex">
                <i class="bi bi-chat-left-text-fill"></i>
                <span>&nbsp;0</span>
              </span>
            </div>
          </div>';
          } else {
            // Print the rest of the posts
            echo '<div class="card col-lg-12 mb-2">
              <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card\'s content.</p>
                <a href="#" class="btn btn-dark">Go somewhere</a>
              </div>
              <div class="col-10 offset-1">
                <img src="img/kermit.png" class="card-img-bottom" />
              </div>
              <div class="col-1 offset-1 comment-stuff d-flex mt-3">
                <span style="font-size: 1.25rem;" class="comment-count d-flex">
                  <i class="bi bi-chat-left-text-fill"></i>
                  <span>&nbsp;0</span>
                </span>
              </div>
            </div>';
          }
        }
        ?>
      </div>
      <!-- Recent posts card -->
      <div class="col-3 d-none d-lg-block">
        <div class="card mb-3">
          <div class="card-body">
            <h5 class="card-title">Recent Posts</h5>
            <ul class="list-group list-group-flush recent-list">
              <?php include('get_recent_posts.php'); ?>
          </div>
        </div>
        <!-- Create a forum card -->
        <div class="card mb-3">
          <div class="card-body">
            <h5 class="card-title">Join or Create Your Own Community!</h5>
            <div class="post-forum-buttons d-flex flex-column">
              <a href="create-post.php" class="btn btn-primary mb-3">Create a Post</a>
              <a href="#" class="btn btn-danger">Create a Forum</a>
            </div>
          </div>
        </div>
        <div class="card about-us-home mb-3">
          <div class="card-body">
            <h5 class="card-title">Quickscope Information</h5>
            <div class="row">
              <a class="col text-decoration-none text-secondary" href="about.html">
                <p class="font-title-12 mt-3">About Us</p>
              </a>
              <a class="col text-decoration-none text-secondary" href="privacy.html">
                <p class="font-title-12 mt-3">Privacy Policy</p>
              </a>
            </div>
            <div class="row">
              <a class="col text-decoration-none text-secondary" href="terms.html">
                <p class="font-title-12">Terms</p>
              </a>
              <a class="col text-decoration-none text-secondary" href="contact.html">
                <p class="font-title-12">Contact</p>
              </a>
            </div>
            <div class="row">
              <a class="col text-decoration-none text-secondary" href="allforums.php">
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
  <!-- This script contains the JS for the moving About Us card -->
  <script>
    $(window).scroll(() => {
      var pos = $(window).scrollTop();
      if (pos > 630) {
        $(".about-us-home").css("margin-top", pos - 615);
      } else {
        if ($(".about-us-home").css("margin-top") != "0px")
          $(".about-us-home").css("margin-top", "0px");
      }
    });
  </script>
</body>

</html>