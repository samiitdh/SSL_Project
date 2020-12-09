<html>
<head>
    <title> Rooms </title> 
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
  <h3>Check Rooms Occupancy</h3>
  <p> Enter a room number to start </p>
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
            <form action='home_admin.php' method='POST'>
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
      
<br/>
<?php
require('init.php');
?>
<form action=admin_room.php method=post>
  <div class="form-group">
    <label for="name"> Enter Room Number </label>
      <input class="form-control" type=text name=query>
  </div>
  <div class="form-group">
    <input class="btn btn-primary" type=submit value=Check>
  </div>
</form>

<?php
if (isset($_POST['query']))
{
    $r = $_POST['query'];
    $q = mysqli_query($connect, "SELECT * FROM rooms WHERE room_no='$r'");
    ?>
    <table class="table table-striped">
      <thead>
        <tr>
          <th>Room Number</th>
          <th>Date</th><th>Time</th>
          <th>Taken By</th>
        </tr>
      </thead>
    <?php
    while ($row=mysqli_fetch_assoc($q))
    {
      $roomno=$row['room_no'];
      $date=$row['date'];
      $time=$row['from_time']." to ".$row['to_time'];
      $owner=$row['owner'];
      echo "<tr><td>$roomno</td><td>$date</td><td>$time</td><td>$owner</td></tr>";
    }
    echo "</table>";
}
?>
<form action=admin_roomreq.php>
  <div class="form-group">
      <input class="btn btn-primary" type=submit value='View Room Requests'>
  </div>
</form>
    </div>
    <div class="col-sm-2 sidenav">
    </div>
  </div>
</div>

<footer class="container-fluid text-center">
  <p>Adiutor by IIT Dharwad </p>
</footer>

</body
