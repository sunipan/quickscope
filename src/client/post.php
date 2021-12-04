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
    mysqli_close($connection);
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
                  <span>&nbsp;Comments ' . $post['comment_count'] . '</span>
                </a>
              </div>
              <div class="card-footer">
                <div class="col-12 form-group">
                  <label for="comment">Comment</label>
                  <textarea class="form-control" id="comment" placeholder="Share your thoughts!" rows="3"></textarea>
                  <button id="post-comment" class="btn btn-primary col-12 mt-2">Post Comment</button>
                </div>
                <small class="text-muted">Posted at - ' . $post['created_at'] . '</small>
              </div>
              <div class="col-12">
                <ul id="comment-section" class="px-2" style="list-style-type: none">
                  <li>
                    <div class="row my-2">
                      <div class="col-2">
                        <img src="https://via.placeholder.com/50" class="rounded-circle" />
                      </div>
                      <div class="col-10">
                        <div class="row">
                          <div class="col-12">
                            <div class="row">
                              <div class="col-12 d-flex flex-column">
                                  <div class="fw-bold">Commented by - ' . $username . '</div>
                                  <div class="pe-4">Lorem Ipsum is simply dummy text of the printing
                                  and typesetting industry. Lorem Ipsum has been the industrys standard
                                  dummy text ever since the 1500s, when an unknown printer took a galley
                                  of type and scrambled it to make a type specimen book. It has survived
                                  not only five centuries, but also the leap into electronic typesetting,
                                  remaining essentially unchanged. It was popularised in the 1960s with
                                  the release of Letraset sheets containing Lorem Ipsum passages, and
                                  more recently with desktop publishing software like Aldus PageMaker
                                  including versions of Lorem Ipsum.</div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </li>
                </ul>
              </div>
            </div>';
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

<?php $scripts = ['js/custom.js'];
require('components/scripts.php'); ?>