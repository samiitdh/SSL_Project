<?php 

include_once 'dbcom.php';
session_start();

?>
<html>
<head>
    <meta charset="UTF-8">
    <title> Event Request </title>
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
  <h3>Event Request</h3>
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
            <form action='view_events.php' method='POST'>
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
        if(array_key_exists("event_submit", $_POST))
        {   
            $title = $_POST['title'];
            $description = $_POST['description'];
            $date = $_POST['date'];
            $time = $_POST['time'];
            $time = $time.":00";
            $datetime = $date." ".$time;

            $sql = "INSERT INTO `event_requests` (`unique_id`, `title`, `description`, `datetime`) VALUES (NULL, '$title', '$description', '$datetime'); ";
            $result = mysqli_query($con, $sql);
            if($result)
                echo "Event Request Submitted\n";
            else    
                echo "Problem submitting request\n";
        }
        ?>
        <form action='event_req.php' method='POST'>
            <div class="form-group">
                <label for="title"> Title </label>
                    <input class="form-control" type="text" name="title" >
            </div>
            <div class="form-group">
            <label for="description"> Description </label>
                <textarea class="form-control" rows="3" name="description" required></textarea>
            </div>
            <div class="form-group">
            <label for="date"> Date </label>
                <input class="form-control" type="date" name="date"> 
            </div>
            <div class="form-group">
            <label for="time"> Time </label>
                <input class="form-control" type="time" name="time"> 
            </div>
            <div class="form-group">
            <label> </label>
                <input class="btn btn-primary" id="event_submit" name="event_submit" type="submit" value="Submit"> 
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
</html>
