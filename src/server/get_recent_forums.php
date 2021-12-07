<?php
require('db_connect.php');
if ($error) {
  die("Connection failed: " . $error);
}
$forums = mysqli_query($connection, "SELECT id, name, post_count FROM forums ORDER BY created_at DESC LIMIT 5");
if (!$forums) {
  mysqli_close($connection);
  die("Query failed: " . mysqli_error($connection));
} else {
  while ($forum = mysqli_fetch_assoc($forums)) {
    echo '<li class="list-group-item recent-post d-flex flex-row justify-content-between">
              <a class="text-decoration-none text-dark fw-bold" href="forum.php?id=' . $forum['id'] . '">
                  ' . $forum['name'] . '
              </a>
              <div class="text-decoration-none">Posts: ' . $forum['post_count'] . '</div>
            </li>';
  }
}
mysqli_close($connection);
