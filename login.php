<?php
  session_start();
  if(isset($_SESSION['password'])){
    echo "wrong password";
  }

  if(isset($_SESSION['user'])){
    echo "user don't exits";
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
</head>
<body>
    <form method = "POST" action ="./validate.php">
        <input type = "text" name = "roll_no" placeholder = "Username" value="<?php if(isset($_COOKIE['usrenameCook'])){echo $_COOKIE['usernameCook'] ;}?>" required>
        <input type = "password" name = "password" placeholder = "Username" value="<?php if(isset($_COOKIE['passwordCook'])){echo $_COOKIE['passwordCook'] ;}?>" required>
        <input type = "checkbox" name = "rememberme"> 
        <button type = "submit" name = "submit">Login</button>
    </form> 
</body>
</html>