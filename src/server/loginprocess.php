<?php
//echo $_POST['username'];
//echo $_POST['password'];


include "db_connect.php";
if($error){
    exit("failed to connect to db");
}


$username = $_POST['username'];

$password = $_POST['password'];



if($_SERVER["REQUEST_METHOD"]== "POST"){
    if(isset($_POST['username']) && isset($_POST['password'])){

    $sql = "SELECT password FROM users WHERE username='$username'"; 
    
    $results = mysqli_query($connection, $sql);

    if($row = mysqli_fetch_assoc($results)){
        
         if(password_verify($password, $row['password'])){
            session_start();
            $_SESSION['user'] = true;
         }

    }else{
        echo "username and/or password are invalid";
    }
    mysqli_free_result($results);
    mysqli_close($connection);
    }
}