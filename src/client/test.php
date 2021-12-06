<?php



$title = "Test | Quickscope 🎯";
require('components/head.php');
if (isset($_SESSION['user'])) {
    header("Location: home.php");
  }
require('components/header.php');
require '../server/db_connect.php';

if ($error) {
    exit($error);
}
$result= mysqli_query($connection, "SELECT isAdmin FROM users WHERE id='$_SESSION[user]'");
if(!$result){
    exit(json_encode([
        'status' => 'db_error',
        'message' => 'Something went wrong, please try again',
        ]));
}
$result= mysqli_fetch_assoc($result);
mysqli_close($connection);
if($result==0){
    exit("user is not admin.");
}
?>


<div class="mt-5">
  <div class="d-flex justify-content-center align-items-center">
    <div class="col-3 form-container mt-5">
      <h3 class="text-white text-center mt-5" id="test">Test</h3>
    <div class="btn-group" role="group" aria-label="Basic example">
      <button type="button" id='test-1' class="btn btn-primary">Query User id's</button>
      <!--<input type="button" id="users" placeholder="query users" class="form-control mb-2">-->
      <!-- <input type="password" id="login_password" placeholder="Password" class="form-control mb-2"> -->
      <button type="button" id='test-2' class="btn btn-primary">Query Post id's</button>
      <button type="button" id='test-3' class="btn btn-primary">Query Forum id's</button>
      <button type="button" id='test-4' class="btn btn-primary">Query Comment id's</button>
    </div>
    <div id="testoutput" class="text-white">

    </div>
      
    </div>
  </div>
</div>



<?php $scripts = ['js/custom.js'];
require('components/scripts.php'); ?>