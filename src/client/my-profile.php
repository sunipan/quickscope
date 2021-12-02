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
    <div class="container post-container rounded bg-white border border-dark border border-5">
        <div class="row justify-content-centern offset-lg-2 ml-5">
            <div class="col-lg-2  mt-5">
                <h1 class='text-black h4 mb-3'>My Profile</h1>
                
                <figure>
                    <img src='img/default_profile_pic.png' height='100px' width='100px'>
                </figure>
            </div>
            <div class="col-8 d-none d-lg-block mt-4">
                
                <h4 class="text-black h5 mt-5 ps-5">Username: Sample_username <a class="d-flex" href="#">
          <img src="img/editicon.png" alt="" width="20" height="20" />
        </a></h4>
                
                <h4 class='text-black h5 mt-4 ps-5'>Email: Sample_email@email.com<a class="d-flex" href="#">
          <img src="img/editicon.png" alt="" width="20" height="20" />
        </a></h4>
            </div>
            
            <div class="">
            <form action='#'>
                <button type='submit' class="btn btn-danger btn-sm">Edit Profile Image</button>
            </form>
            </div>

            <div class="col-lg-10 mb-3">
            <h3 class='text-white'>My Activity</h3>
            <?php
            for($i = 0; $i < 3; $i++){
            echo '
            <div class="card-fluid col-lg-12 mb-3 bg-dark" >
                <div class="card-body">
                    <p><b class="text-white">Forum Name - Posted By Sample_username</b></p>
                    <p class="card-text text-white">Sample comment/post</p>
                </div>
            </div>';
            }
            ?>
            
        </div>
        </div>
       
        
        
    </div>
</body>


</html>