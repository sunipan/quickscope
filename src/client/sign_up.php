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

    #createAcc {
      margin-top: 17em;
      color: white;
      padding-bottom: 0.5em;
    }

    h1 {
      font-size: large;
    }
  </style>
</head>

<body>




  <form name="createAcc" action="createAccprocess.php">
    <h1 id="createAcc" for="createAcc">Create Account</h1>
    <div class="inputs">
      <input type="text" placeholder="email"></input>
      <br>
      <input type="text" placeholder="username"></input>
      <br>
      <input type="text" placeholder="password"></input>
      <br><br>
      <input type="submit"></input>
    </div>
  </form>

</body>

</html>