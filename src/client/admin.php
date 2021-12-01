<?php 
session_start();
$_SESSION['user'] = 'admin';
//session_destroy();
include('app.php'); 

if(isset($_SESSION['user'])){
    $user = $_SESSION['user'];
}
else{
    $user = "";
}

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
    <title>Quickscope - Forum For LEETS</title>
    </head>';

    if($user == 'admin'){
    echo
    '<body>
    <br><br>

    <div class="container mt-5 pt-5" align ="center">
        <h1 class="text-white">Admin</h1>
    </div>

    <div class="container-fluid">
        <div class="col-lg-10 offset-lg-1">
                <div class="card-body">
                        <form id="adminSearch" action="admin.php" method="POST">
                            <div class="p-1 col-lg-6 offset-lg-3" align ="center">
                                <input type="text" class="form-control" id="input" name="input" placeholder="Search for user by name, email, or post" required>
                                <br>
                                <button type="submit" class="btn btn-dark">Search</button>
                            </div>
                        </form>
                </div>
        </div>
    </div>
    <br>';

    

    if(isset($_POST['input'])){

        //code here to make connection to db, return results
        $input = $_POST['input'];
        if($input != ""){
        echo
            '<div class="container-fluid mb-5">
                <div class="col-lg-10 offset-lg-1">
                    <div class="card col-lg-6 offset-lg-3 bg-white" align="center">
                        <div class="card-body">
                            <p align="left"><b>User:</b> sample_username</p>
                            <hr>
                            <div align="left">
                                <button class="btn btn-primary">Enable</button>
                                <button class="btn btn-danger">Disable</button>
                            </div>
                            <br>
                            <p align="left"><b>Post History</b></p>';
        
        for($i = 0; $i < 6; $i++){
            echo
                '<div class="border border-dark p-2">
                    <p align="left"><b>Title:</b> Quickscope Mania!</p>
                    <div align="right">
                        <button class="btn btn-dark">Explore</button>
                    </div>
                </div>';
        }                     

        echo                    
                        '</div>
                    </div>
                </div>
            </div>';
    }
    }
    

echo
'</body>

</html>';
    }

else{
    echo
    '<br><br>
    <div class="container mt-5 pt-5 col-lg-8" align ="center">
        <h2 class="text-white">You do not have authorization to view this page</h2>
        <br>
        <div class="m-3">
            <a href="home.php" class="gray_on_hover">Home</a>
        </div>
    </div>
    

    </html>';
}

?>