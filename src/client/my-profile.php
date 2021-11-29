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
            <div class="col-lg-3 offset-lg-1">
                <h1 class='text-white'>My Profile</h1>
                <br>
                <figure>
                    <img src='img/default_profile_pic.png' height='200px' width='200px'>
                </figure>
            </div>
            <div class="col-7 d-none d-lg-block">
                <br><br><br><br><br>
                <h4 class="text-white">Username: Sample_username</h4>
                <br>
                <h4 class='text-white'>Email: Sample_email@email.com</h4>
            </div>
        </div>
        <br>
        <div class="offset-lg-1">
            <form action='#'>
                <button type='submit' class="btn btn-dark">Edit Profile</button>
            </form>
        </div>
        <br><br>
        <div class="col-lg-10 offset-lg-1">
            <h3 class='text-white'>My Activity</h3>
            <?php
            for($i = 0; $i < 5; $i++){
            echo '
            <div class="card col-lg-12 mb-3 bg-white">
                <div class="card-body">
                    <p><b>Forum Name - Posted By Sample_username</b></p>
                    <p class="card-text">Sample comment/post</p>
                </div>
            </div>';
            }
            ?>
        </div>
    </div>
</body>


</html>