<html>
<head>
    <meta charset="UTF-8">
    <title> Faculty Course </title>
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
        @media screen and (max-width: 767px) {
            .sidenav {
            height: auto;
            padding: 15px;
            }
            .row.content {height:auto;} 
        }
        .jumbotron {
            height:auto;
            padding:1px 0 !important;
        }
        footer {
            position: absolute;
            bottom: 0;
            width: 100%;
            color: #fff;
            background-color: #000;
            padding: 15px;
        }
    </style>
</head>
<body>
<div class="jumbotron text-center" style="margin-bottom:0">
  <h3>Faculty Course</h3>
  <p> Press the button to add a new deadline </p>
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
            <form action='home_faculty.php' method='POST'>
                <li><button style="float: left; margin-right:16px" type ="submit" class="btn btn-info" value="Go back">Back</button></li>
            </form>
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
session_start();
require('init.php');

if(isset($_GET['action']))
{
  $rollno = $_GET['rollno'];
  $title = $_GET['title'];
  $datetime = $_GET['datetime'];
  $description = $_GET['description'];
  $q = mysqli_query($connect,"DELETE FROM `{$rollno}_deadlines` WHERE `title`='$title';");
}


$rollno = $_SESSION['roll_no'];

$extract = mysqli_query($connect, "SELECT * FROM `courses` WHERE `roll_number`=$rollno;");

$row = mysqli_fetch_assoc($extract);

$name = $row['name'];
$instructor = $row['instructor'];
echo "<h2>$name</h2>";

if(true)
{
  $extract = mysqli_query($connect, "SELECT * FROM {$rollno}_deadlines;");
  echo "<h3>Deadlines</h3>";
  ?>
  <table class="table table-striped">
  <thead>
    <tr>
      <th>Title</th>
      <th>Description</th>
      <th>Date and Time</th>
      <th>Delete</th>
    </tr>
  </thead>
  <?php
  while($row = mysqli_fetch_assoc($extract))
  {
    $title = $row['title'];
    $description = $row['description'];
    $datetime = $row['datetime'];
    echo "<tr><td>$title</td><td>$description</td><td>$datetime</td><td><a href = 'faculty_courses.php?action=1&rollno=$rollno&title=$title&datetime=$datetime&description=$description'>Delete</a></td></tr>";
  }
  echo "</table>";
}
?>
<form action='new_deadline.php'>
  <input class="btn btn-info" type=submit value='Add a new deadline'>
</form>

</div>
    <div class="col-sm-2 sidenav">
    </div>
  </div>
</div>

<footer class="container-fluid text-center">
  <p>Adiutor by IIT Dharwad </p>
</footer>

</body>