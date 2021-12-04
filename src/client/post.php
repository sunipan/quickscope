<?php
if ($_SERVER['REQUEST_METHOD'] != "GET")
  header("Location: home.php");
require("../server/db_connect.php");
if ($error)
  die($error);
$id = $_GET['id'];
// Query for forum
$query = "SELECT * FROM posts WHERE id = '$id'";
$result = mysqli_query($connection, $query);
if (!$result)
  die("Error: " . mysqli_error($connection));
else {
  // Query for posts inside queried forum
  $post = mysqli_fetch_assoc($result);
  $title = $post['title'] . " | Quickscope 🎯";
  $query = "SELECT username FROM users WHERE id = '{$post['user_id']}'";
  $result = mysqli_query($connection, $query);
  if (!$result)
    die("Error: " . mysqli_error($connection));
  else {
    $row = mysqli_fetch_assoc($result);
    $username = $row['username'];
    mysqli_free_result($result);
  }
}
require('components/head.php');
require('components/header.php');
?>

<div class="container-fluid post-container">
  <div class="row">
    <div class="col-lg-7 offset-lg-1">
      <div class="h2 text-white">
        <?php echo $username . '\'s post'; ?>
      </div>
      <?php
      if ($post)
        $hasImage = isset($post['image']) ? '' : 'd-none';
      echo '<div class="card col-lg-12 mb-2">
              <div class="card-body">
                <h5 class="card-title">' . $post['title'] . '</h5>
                <p class="card-text">' . $post['description'] . '</p>
              </div>
              <hr class="m-0">
              <div class="col-10 offset-1 ' . $hasImage . '">
                <img src="' . $post['image'] . '" class="card-img-bottom" />
              </div>
              <div class="col-3 comment-stuff d-flex">
                <a href="post.php?id=' . $post['id'] . '" class="comment-count text-decoration-none text-dark d-flex flex-row">
                  <i class="bi bi-chat-square-dots"></i>
                  &nbsp;Comments&nbsp; <span id="comment-count">' . $post['comment_count'] . '</span>
                </a>
              </div>
              <div class="card-footer">
                <div class="col-12 form-group">
                  <label for="comment">Comment</label>
                  <textarea class="form-control" id="comment" placeholder="Share your thoughts!" rows="3"></textarea>
                  <input type="hidden" id="post_id" value="' . $post['id'] . '">
                  <button id="post-comment" class="btn btn-primary col-12 mt-2">Post Comment</button>
                  <div class="alert alert-danger col-12 mt-2 d-hide" id="comment_error" role="alert"></div>
                  <div class="alert alert-success col-12 mt-2  d-hide" id="comment_success" role="alert"></div>
                </div>
                <small class="text-muted">Posted at - ' . $post['created_at'] . '</small>
              </div>
              <div class="col-12">
                <ul id="comment-section" class="list-group px-2 mb-2" style="list-style-type: none">';
      // List comments
      if ($post['comment_count'] > 0) {
        $query = "SELECT * FROM comments WHERE post_id = '{$post['id']}'";
        $result = mysqli_query($connection, $query);
        if (!$result)
          die("Error: " . mysqli_error($connection));
        else {
          while ($comment = mysqli_fetch_assoc($result)) {
            echo '<li class="list-group-item">
                    <div class="row my-2">
                      <div class="col-2">
                        <img class="rounded-circle border border-2 border-danger" height=50 width=50 src="' . $comment['user_avatar'] . '" />
                      </div>
                      <div class="col-10">
                        <div class="row">
                          <div class="col-12">
                            <div class="row">
                              <div class="col-12 d-flex flex-column">
                                  <div class="fw-light fst-italic">Commented by - <span class="fw-bold">' . $comment['user_name'] . '</span></div>
                                  <div id="comment-text" class="pe-4">' . $comment['comment'] . '</div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </li>';
          }
          echo '</ul>
              </div>
            </div>';
        }
      } else {
        echo '</ul>
            </div>
            <div id="no-comments" class="col-12 h4 text-center mb-3">No comments yet!</div>
          </div>';
      }
      ?>
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

<?php $scripts = ['js/custom.js'];
require('components/scripts.php'); ?>