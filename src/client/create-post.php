<?php $title = "Create Post | Quickscope 🎯";
require('components/head.php');
require('components/header.php');
?>


<div class='container mt-5 pt-5 pb-4 offset-lg-1'>
  <h1 class='text-white'>Create Post</h1>
</div>


<div class="container-fluid">
  <div class="col-lg-10 offset-lg-1">
    <div class="card col-lg-12 mb-2 bg-secondary">
      <div class="card-body">
        <form>
          <div class="p-1 col-lg-12">
            <select class="form-select" name="forum" id="forum">
              <option value="" disabled selected>Post to a Forum!</option>
              <option value="f1">Forum 1</option>
              <option value="f2">Forum 2</option>
              <option value="f3">Forum 3</option>
              <option value="f4">Forum 4</option>
            </select>
          </div>
          <div class="p-1 col-lg-12">
            <input type="text" class="form-control" id="postTitle" placeholder="Title">
          </div>
          <div class="p-1 col-lg-12">
            <textarea class="form-control" id="description" placeholder="Description" rows="12"></textarea>
          </div>
          <div class="offset-lg-11 p-2">
            <button type="Submit" class="btn btn-dark">Submit</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<?php require('components/scripts.php'); ?>