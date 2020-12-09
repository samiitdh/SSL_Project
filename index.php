<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="./signin.css" rel="stylesheet">
  <link href="./bootstrap.min.css" rel="stylesheet">
</head>
<body class="text-center">
  <div class="container"> 
    <form class="form-signin" method = "POST" action ="./validate.php">
    <h1 class="mb-4" > Adiutor </h1>
    <h3 class="h3 mb-3 font-weight-normal">Please sign in</h3>
    <?php
        require('init.php');
        session_start();
        if(isset($_SESSION['password'])){
          echo "Wrong Password\n";
        }

        if(isset($_SESSION['user'])){
          echo "User doesn't exist\n";
        }
      ?>
    <br>
    <label for="inputEmail" class="sr-only">Email address</label>
      <input type="text" name = "roll_no" id="inputEmail" value="<?php if(isset($_COOKIE['usernameCook'])){echo $_COOKIE['usernameCook'] ;}?>" class="form-control" placeholder="Email address" required="" autofocus="">
    <label for="inputPassword" class="sr-only">Password</label>
    <input type="password" name = "password" id="inputPassword" class="form-control" value="<?php if(isset($_COOKIE['passwordCook'])){echo $_COOKIE['passwordCook'] ;}?>" placeholder="Password" required="">
    <div class="checkbox mb-3">
      <label>
        <input type="checkbox" value="remember-me"> Remember me
      </label>
    </div>
      <button class="btn btn-lg btn-primary btn-block" name = "submit" type="submit">Sign in</button>
    </form>
  </div>
</body>
</html>