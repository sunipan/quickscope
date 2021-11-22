<?php include('app.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <link rel="stylesheet" href="css/style.css" />
  <title>Quickscope - Forum For LEETS</title>
</head>

<body>
  <div class="container post-container">
    <div class="col-3 about-us-home d-none d-lg-block">
      <h2 class="hide">placeholder</h2>
      <div class="card">
        <div class="card-body">
          <h5 class="card-title text-center
          ">Quickscope Information</h5>
          <div class="row text-center">
            <a class="col text-decoration-none text-secondary" href="about.html">
              <p class="font-title-12 mt-3">About Us</p>
            </a>
            <a class="col text-decoration-none text-secondary" href="privacy.html">
              <p class="font-title-12 mt-3">Privacy Policy</p>
            </a>
          </div>
          <div class="row text-center">
            <a class="col text-decoration-none text-secondary" href="terms.html">
              <p class="font-title-12">Terms</p>
            </a>
            <a class="col text-decoration-none text-secondary" href="contact.html">
              <p class="font-title-12">Contact</p>
            </a>
          </div>
          <div class="row text-center">
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
    <div class="col-3 create-a-forum d-none d-lg-block">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title text-center">Create a Forum</h5>
        </div>
      </div>
    </div>
  </div>
  <!-- Create fake posts by changing $i threshold -->
  <?php
  for ($i = 0; $i < 10; $i++) {
    if ($i === 0) {
      // Print the first post
      echo '<div class="col-lg-6 offset-lg-1 mb-2">
          <div class="header text-white">
            <h2>Popular Posts</h2>
          </div>
          <div class="card col-lg-12">
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card\'s content.</p>
              <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
            <img src="img/kermit.png" class="card-img-bottom" />
          </div>
        </div>';
    } else {
      // Print the rest of the posts
      echo '<div class="mb-2">
            <div class="col-lg-6 offset-lg-1">
            <div class="card col-lg-12">
              <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card\'s content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
              </div>
              <img src="img/kermit.png" class="card-img-bottom" />
            </div>
          </div>
        </div>';
    }
  }
  ?>
  </div>
  <script src="js/custom.js"></script>
</body>

</html>