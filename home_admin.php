<html>
<head>
    <title> Admin Home </title> 
    <meta charset="utf-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <style>
    body, html {
        height: 100%;
    }
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
    </style>
</head>

<?php

if(isset($_POST['add_individual'])){
    header('location:add_individual.php');
}

if(isset($_POST['viewAdelete'])){
    header('location:admin_view.php');
}

if(isset($_POST['room'])){
    header('location:admin_room.php');
}

if(isset($_POST['event_EC'])){
    header('location:event_coordinator.php');
}

if(isset($_POST['view_courses'])){
    header('location:view_courses.php');
}

if(isset($_POST['add_student_course'])){
    header('location:add_students.php');
}

?>
<body>
<div class="jumbotron text-center" style="margin-bottom:0">
  <h1>Adiutor</h1>
  <p>Welcome Admin!</p> 
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
        <form method = "POST" action = "home_admin.php">
            <li><button style="float: left; margin-right:16px" type ="submit" class="btn btn-info" name = "add_individual">Add Individual</button></li>
            <li><button style="float: left; margin-right:16px" type ="submit" class="btn btn-info" name = "viewAdelete">View Existing Individual</button></li>
            <li><button style="float: left; margin-right:16px" type ="submit" class="btn btn-info" name = "view_courses">View Courses</button></li>
            <li><button style="float: left; margin-right:16px" type ="submit" class="btn btn-info" name = "add_student_course">Add Students to Courses</button></li>
            <li><button style="float: left; margin-right:16px" type ="submit" class="btn btn-info" name = "room">Room Occupancy</button></li>
            <li><button style="float: left; margin-right:16px" type ="submit" class="btn btn-info" name = "event_EC">Event Coordinator</button></li>
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
      <h1>Welcome</h1>
      <p>Adiutor is latin for assistant. This is a website which aims at making the lives
    of students and faculty alike easier. This website can help in keeping track of events
    including important deadlines in the form of a timetable which is personalized for each
    individual</p>
      <hr>
      <h3>Note</h3>
      <p>The web page has different types of roles. Each person can have an account based
        on their role</p>
    </div>
    <div class="col-sm-2 sidenav">
    </div>
  </div>
</div>

<footer class="container-fluid text-center">
  <p>Adiutor by IIT Dharwad </p>
</footer>
</body>