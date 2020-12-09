<?php
session_start();
require('init.php');

$roll_no = $_SESSION['roll_no'];
?>

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
            padding:1px 0 !important;
        }
        footer {
            position: ;
            bottom: 0;
            width: 100%;
            color: #fff;
            background-color: #000;
            padding: 15px;
        }
        ul{
          display:inline-block;
        }
    </style>
</head>
</html>

<body>
<div class="jumbotron text-center" style="margin-bottom:0">
  <h3>Event Coordinator</h3>
  <p> Home </p> 
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
        <?php
          if($roll_no['0'] == "9"){
            ?>
            <form action = "./home_faculty.php">
              <button style="float: left; margin-right:16px" type ="submit" class="btn btn-info">Back</button>
            </form>
            <?php
          }
          else{
            ?>
            <form action = "./home_student.php">
              <button style="float: left; margin-right:16px" type ="submit" class="btn btn-info">Back</button>
            </form>
            <?php
          }
        ?>
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
require('init.php');

if(isset($_GET['action']))
{
  $title = $_GET['title'];
  $description = $_GET['description'];
  $datetime = $_GET['datetime'];
  if ($_GET['action'])
  {
    $q = mysqli_query($connect,"INSERT INTO `events` (`title`, `description`,`datetime`) VALUES ('$title', '$description','$datetime')");
  }
  $q = mysqli_query($connect,"DELETE FROM event_requests WHERE title='$title' AND (datetime='$datetime' AND description='$description')");
}

$extract = mysqli_query($connect, "SELECT * FROM event_requests");
?>
<br>
<form action='eventco_view.php'>
  <input class="btn btn-primary" type=submit value='View Events'>
</form>
<br>
<form action='add_events.php'>
  <input class="btn btn-primary" type=submit value='Add New Event'>
</form>
<?php
echo "<h3 style='text-align: center'>Event Requests</h3>";
?>
<table class="table table-striped">
<thead>
  <tr>
    <th>Title</th>
    <th>Description</th>
    <th>Date and Time</th>
    <th>Accept</th><th>Deny</th>
  </tr>
</thead>
<?php
while($row = mysqli_fetch_assoc($extract))
{
  $title = $row['title'];
  $description = $row['description'];
  $datetime = $row['datetime'];
  echo "<tr><td>$title</td><td>$description</td><td>$datetime</td><td><a href = 'home_eventco.php?action=1&title=$title&datetime=$datetime&description=$description'>Accept</a></td><td><a href = 'home_eventco.php?action=0&title=$title&datetime=$datetime&description=$description'>Deny</a></td></tr>";
}
echo "</table>";
echo "</br>";
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

