<?php
session_start();
require('init.php');
$roll_no = $_SESSION['roll_no'];
?>

<html>
<head>
    <title> Student Home </title> 
    <meta charset="utf-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <style>
        .navbar {
            margin-bottom: 0;
            border-radius: 0;
        }

        .row.content {height: 450px}

        .sidenav {
            padding-top: 20px;
            background-color: #f1f1f1;
            height: 100%;
        }

        footer {
            background-color: #555;
            color: white;
            padding: 15px;
        }

        @media screen and (max-width: 767px) {
            .sidenav {
            height: auto;
            padding: 15px;
            }
            .row.content {height:auto;} 
        }
        .jumbotron {
            height:auto;
            padding:5px 0 !important;
        }
        footer {
            bottom: 0;
            width: 100%;
            color: #fff;
            background-color: #000;
        }
        ul{
          display:inline;
        }
    </style>
</head>

<body>
<div class="jumbotron text-center" style="margin-bottom:0">
  <h1>Adiutor</h1>
  <p>Welcome!</p> 
</div>
<nav class="navbar navbar-inverse">
<div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
    </button>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="list-inline" class="nav navbar-nav">
          <br/>
            <li>
              <form action='view_events.php'>
                <input class="btn btn-info" type=submit value='Events'></form>
            </li>
            <li>
              <form action='change_pswd.php?roll_no=$roll_no' method='get'>
                <input class="btn btn-info" type=submit value='Change Password'></form>
            </li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <form method = "POST" action = "./logout.php">
            <li><button class="btn btn-danger" type ="submit"> Log Out </button><span class="glyphicon glyphicon-log-in"></span></li>
        </form>
        </ul>
    </div>
</div>
</nav>
<div class="container-fluid text-center">    
  <div class="row content">
    <div class="col-sm-2 sidenav">
    </div>
    <div class="col-sm-8 text-left"> 

<?php

$q=mysqli_query($connect, "SELECT * FROM individual WHERE roll_no=$roll_no;");
while($row = mysqli_fetch_assoc($q))
{
  $uid=$row['unique_id'];
  $role=$row['role'];
}

$extract = mysqli_query($connect, "SELECT * FROM individual WHERE roll_no='$roll_no'");
$id = "";
while ($row = mysqli_fetch_assoc($extract))
{
  $id = $row['unique_id'];
}

if(isset($role))
{
  if($role == 'studentEC' || $role == 'facultyEC')
  { 
    ?>
    <br/>
    <form action='home_eventco.php'>
      <input class="btn btn-info" type=submit value='Go to Event Coordinator homepage'>
    </form>
    <?php
  }
}

if (isset($_GET['action']))
{
  if($_GET['action'])
  {
    $title = $_GET['title'];
    $description = $_GET['description'];
    $datetime = $_GET['datetime'];
    $q = mysqli_query($connect,"DELETE FROM {$id}_deadlines WHERE (title='$title' AND (datetime='$datetime' AND description='$description'))");
  }
  else
  {
    $title = $_GET['title'];
    $description = $_GET['description'];
    $datetime = $_GET['datetime'];

    $q = mysqli_query($connect,"DELETE FROM {$roll_no}_events WHERE (title='$title' AND (datetime='$datetime' AND description='$description'))");
  }
}

$extract = mysqli_query($connect,"SELECT * FROM `courses`;");
echo "<h3 style='text-align: center'>Deadlines</h3>";
?>
<table class="table table-striped">
  <tr>
    <th>Title</th>
    <th>Description</th>
    <th>Date and Time</th>
  </tr>
<?php
while ($row = mysqli_fetch_assoc($extract))
{
  $cid = $row['roll_number'];
  $q = mysqli_query($connect,"SELECT * FROM {$cid}_course;");
  $flag = 0;
  while($r = mysqli_fetch_assoc($q))
  {
    if ($roll_no == $r['roll_no'])
    {
      $flag = 1;
      break;
    }
  }
  if($flag == 1)
  {
    $q = mysqli_query($connect,"SELECT * FROM {$cid}_deadlines");
    while($r = mysqli_fetch_assoc($q))
    {
      $t=$r['title'];
      $des = $r['description'];
      $dt = $r['datetime'];
      $flag1 = 1;
        echo "<tr><td>$t</td><td>$des</td><td>$dt</td></tr>";
    }
  }
}
echo "</table>";


if($id != '')
{
  $extract = mysqli_query($connect, "SELECT * FROM {$roll_no}_events");

  echo "<h3 style='text-align: center'>My Events</h3>";
  ?>
  <table class="table table-striped">
    <tr>
      <th>Title</th>
      <th>Description</th>
      <th>Date and Time</th>
      <th>Delete</th>
    </tr>
  <?php
  while($row = mysqli_fetch_assoc($extract))
  {
    $title = $row['title'];
    $description = $row['description'];
    $datetime = $row['datetime'];
    echo "<tr><td>$title</td><td>$description</td><td>$datetime</td><td><a href = 'home_student.php?action=0&title=$title&datetime=$datetime&description=$description'>Delete</a></td></tr>";
  }
  echo "</table>";
  echo "</br>";
}

?>
</div>
    <div class="col-sm-2 sidenav">
    </div>
  </div>
</div>

<footer class="container-fluid text-center">
  <p>Adiutor by IIT Dharwad </p>
</footer>

</body>
