<?php
include "db_connect.php";

$username = $_POST['username'];

$password = $_POST['password'];

$passwordHash = password_hash($_POST['password'], PASSWORD_DEFAULT);

if($_SERVER["REQUEST_METHOD"]== "POST"){
    if(isset($_POST['username']) && isset($_POST['password'])){

    $sql = "SELECT * FROM users WHERE (username='$username' AND password=password_verify($password,$passwordHash));";
    $results = mysqli_query($connection, $sql);

    if($row = mysqli_fetch_assoc($results)){
        $_SESSION['username'] = $username;
        header("Location: home.php");
    }else{
        echo "username and/or password are invalid";
    }
    mysqli_free_result($results);
    mysqli_close($connection);
    }
}