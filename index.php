<?php
  session_start();

  if(!isset($_SESSION['roll_no'])){
      header('location:signup.php');
  }
  if(isset($_SESSION['admin'])){
    echo "welcome";
  }
?>
<?php
 echo $_SESSION['roll_no'];
?>

<form method = "POST" action = "./logout.php">
    <button type = "submit" name = "submit">Log out</button>
</form>
