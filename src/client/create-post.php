<?php $title = "Create Post | Quickscope 🎯";
require('components/head.php');
if (!isset($_SESSION['user'])) {
  header('Location: login.php');
}
require('components/header.php');


echo
'<div class="container mt-5 pt-5 pb-4 offset-lg-1">
  <h1 class="text-white">Create Post</h1>
</div>


<div class="container-fluid">
  <div class="col-lg-10 offset-lg-1">
    <div class="card col-lg-12 mb-2 bg-secondary">
      <div class="card-body">
        
          <div class="p-1 col-lg-12">
            <select class="form-select" name="forum" id="forum">
              <option value="" disabled selected>Post to a Forum!</option>';


              include('../server/db_connect.php');
              if ($error) {
                
                
            } 
            else{
              $sql = "SELECT * FROM forums;";
              $results = mysqli_query($connection, $sql);
              
              
              while ($row = mysqli_fetch_assoc($results)) {
                echo '<option value="'.$row["name"].'">'.$row["name"].'</option>';
               }

            }
              


              echo
            '</select>
          </div>
          <div class="p-1 col-lg-12">
            <input type="text" class="form-control" id="postTitle" placeholder="Title">
          </div>
          <div class="p-1 col-lg-12">
            <textarea class="form-control" id="description" placeholder="Description" rows="12"></textarea>
          </div>
          <div class="p-1 col-lg-12 mt-4">
            <h5 class="text-white" style="display: inline">Upload Image</h5>
            <input type="file" name="postImage" id="postImage">
          </div>
          <div class="offset-lg-11 p-2">
            <button type="Submit" class="btn btn-dark" id="postButton">Submit</button>
          </div>
        <div class="alert alert-danger text-center mt-2 col-lg-4 offset-lg-4" role="alert" id="login_feedback"></div>
      </div>
    </div>
  </div>
</div>';

$scripts = ['js/custom.js'];
 require('components/scripts.php'); ?>