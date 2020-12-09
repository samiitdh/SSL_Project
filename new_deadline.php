<html>
<head>
    <meta charset="UTF-8">
    <title> New Deadline </title>
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
  <h3>New Deadline</h3>
  <p> Enter relevant information </p>
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
            <form action='faculty_courses.php' method='POST'>
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
$roll = $_SESSION['roll_no'];
include './dbcom.php';
$table_name = "courses";
$sql = "SELECT * FROM `courses` WHERE `roll_number`=$roll;";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($result);
$name = $row['name'];

mysqli_close($con);
?>

<form action = "./deadline_validation.php" method = "POST">
<div class="form-group">
       <label for="name"> Course </label> 
       <select name = "name">
              <option value =<?=$name?>><?php echo $name; ?></option>
       </select>
</div>
<div class="form-group">
       <label for="name"> Title </label> 
       <input class="form-control" type = "text" name = "title" required="">
</div>
<div class="form-group">
       <label for="des"> Description </label> 
       <input class="form-control" type = "text" name = "des" required="">
</div>
<div class="form-group">
       <label for="date"> Date </label> 
       <input class="form-control" type = "date" name = "date" required="">
</div>
<div class="form-group">
       <label for="time"> Time </label> 
       <input class="form-control" type = "time" name = "time" required="">
</div>
<div class="form-group">
       <button class="btn btn-primary" type = "submit" name ="deadline_time">Submit</button>
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

</body>
