<?php 
//session_start();
//$_SESSION['user'] = 'sample';
//session_destroy();
include('app.php');
echo
'<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" href="css/style.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.1/font/bootstrap-icons.css">
  <script src="js/custom.js"></script>
  <title>Quickscope - Forum For LEETS</title>
</head>';

if(isset($_SESSION['user'])){
    echo
    '<br><br>
    <div class="container mt-5 pt-5" align ="center">
        <h1 class="text-white">Create Forum</h1>
    </div>
    <div class="container-fluid">
        <div class="col-lg-10 offset-lg-1">
                <div class="card-body">
                        
                            <div class="p-1 col-lg-6 offset-lg-3" align ="center">
                                <input type="text" class="form-control" id="postTitle" placeholder="Title" required>
                            </div>
                            <br>
                            <div class="p-1 col-lg-6 offset-lg-3" align ="center">
                                <input type="checkbox" id="confirm" name="confirm" value="true" required>
                                <label for="confirm" class="text-white">I confirm the creation of this forum</label>
                            </div>
                            <br>
                            <div class="p-2" align="center">
                                <button id="forumButton" class="btn btn-dark">Create</button>
                                <div class="alert alert-danger text-center mt-2 col-lg-4" role="alert" id="login_feedback"></div>
                            </div>
                            
                            
                        
                </div>
        </div>
    </div>
    </html>';

}

else{
    echo
    '<br><br>
    <div class="container mt-5 pt-5 offset-lg-3 col-lg-6" align ="center">
        <h2 class="text-white">You must be signed in to create a forum!</h2>
        <br>
        <div class="d-flex justify-content-between">
            <a href="home.php" class="gray_on_hover m-5">Back to home</a>
            <a href="login.php" class="gray_on_hover m-5">Login</a>
        </div>
    </div>
    
    </html>';
}
?>