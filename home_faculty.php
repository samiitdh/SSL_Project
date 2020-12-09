<html>
<head>
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
          display:inline-block;
        }
    </style>
</head>
</html>

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
            <li>
                <form action='faculty_room.php'>
                <input class="btn btn-info" type=submit value='View Room Allotment'></form>
            </li>
            <li>
              <form action='faculty_courses.php'>
              <input class="btn btn-info" type=submit value='View My Courses'></form>
            </li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <br/>
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
header('Cache-Control: max-age=900');
$roll_no = $_SESSION['roll_no'];
$q=mysqli_query($connect, "SELECT * FROM individual WHERE roll_no=$roll_no;");
while($row = mysqli_fetch_assoc($q))
{
  $uid=$roll_no;
  $role=$row['role'];
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
$extract = mysqli_query($connect, "SELECT * FROM individual WHERE roll_no='$roll_no'");
$id = "";
while ($row = mysqli_fetch_assoc($extract))
{
  $id = $roll_no;
}

if (isset($_GET['action']))
{
  if($_GET['action'])
  {
    $title = $_GET['title'];
    $description = $_GET['description'];
    $datetime = $_GET['datetime'];
    $q = mysqli_query($connect,"DELETE FROM {$id}_deadlines WHERE title='$title' AND datetime='$datetime' AND description='$description';");
  }
  else
  {
    $uid = $_GET['id'];
    $q = mysqli_query($connect,"DELETE FROM {$id}_events WHERE unique_id=$uid;");
  }
}

if($id != '')
{
  $extract = mysqli_query($connect, "SELECT * FROM `{$roll_no}_events`");

  echo "<h3 style='text-align: center'>Events</h3>";
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
    $id = $row['unique_id'];
    ?>
      <tr>
        <td><?=$title?></td>
        <td><?=$description?></td>
        <td><?=$datetime?></td>
        <td><?php echo "<a href = home_faculty.php?action=0&id=$id>Delete</a>"?></td>
      </tr>
      <?php
  }
  ?>
  </table>
  <?php
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