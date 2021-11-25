<?php include('app.php'); ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css" />

    <style>
        
        body {
    text-align: center;
    }
        form {
    display: inline-block;
    }
    #logintitle{
            margin-top: 17em;
            color: white;
            padding-bottom:0.5em;
        }
        h1{
        font-size: large;
    }

    a{
        color: white;
        font-size:small;
    }


        
    </style>
</head>

<body>
    

    

    <form name="login" action="loginprocess.php"> 
        <h1 id="logintitle" for="login">Login</h1>
    <div class="inputs">
        <input type="text" placeholder="Username"></input>
        <br>
        <input type="text" placeholder="Password"></input>
        <br>
        <a href="">Forgot Password?</a>
        <br><br>
        <input type="submit"></input>
    </div>
  
    </form>
    
</body>
</html>
