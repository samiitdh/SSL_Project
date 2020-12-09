<html>
<head>
    <title> Add Individual </title>
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
            padding:2px 0 !important;
        }
        footer {
            position: absolute;
            bottom: 0;
            width: 100%;
            color: #fff;
            background-color: #000;
        }
    </style>
</head>
<body>
    <div class="jumbotron text-center" style="margin-bottom:0">
        <h2>Add individual</h2>
        <p>Please enter relevant information</p> 
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
            <form action='add_individual.php' method='POST'>
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
    <?php

include_once 'dbcom.php';

$name = $_POST['name'];
$roll_no = $_POST['r_number'];
$role = $_POST['role'];
?>
<div class="container-fluid text-center">    
        <div class="row content">
            <div class="col-sm-2 sidenav">
            </div>
            <div class="col-sm-8 text-left"> 
        </br>
<?php
if($role == "student")
{
    $password = "student"."_".$roll_no;
    $query = "SELECT `unique_id` FROM `individual` WHERE `roll_no` = '$roll_no' ;";
    $result = mysqli_query($con, $query);
    if($result->num_rows == 0)
    {   
        $check = true;
        $query = "INSERT INTO `individual` (`unique_id`, `name`, `roll_no`, `password`, `role`, `event_array`) VALUES (NULL, '$name', '$roll_no', '$password', 'student', '');";
        $bool = mysqli_query($con, $query);
        if(!$bool)
            $check = false;
        $table_name1 = $roll_no."_timetable";
        $table_name2 = $roll_no."_events";
        $sql1 = "CREATE TABLE `adiutor`.`$table_name1` ( `unique_id` INT NOT NULL AUTO_INCREMENT , `title` TEXT NOT NULL , `description` TEXT NOT NULL , `datetime` DATETIME NOT NULL , PRIMARY KEY (`unique_id`)) ENGINE = InnoDB; ;";
        $bool = mysqli_query($con, $sql1);
        if(!$bool)
            $check = false;
        $sql2 = "CREATE TABLE `adiutor`.`$table_name2` ( `unique_id` INT NOT NULL AUTO_INCREMENT , `title` TEXT NOT NULL , `description` TEXT NOT NULL , `datetime` DATETIME NOT NULL , PRIMARY KEY (`unique_id`)) ENGINE = InnoDB; ;";
        $bool = mysqli_query($con, $sql2);
        if(!$bool)
            $check = false;
        if($check)
            echo "<h2> Added\n </h2>";
        else
            echo "<h2> Problem Insertion\n </h2>";
    }
    else
    {
        echo "<h2> Roll number already exists </h2>";
    }
}
if($role == "faculty")
{
    $password = "faculty"."_".$roll_no;
    $query = "SELECT `unique_id` FROM `individual` WHERE `roll_no` = '$roll_no' ;";
    $result = mysqli_query($con, $query);
    if($result->num_rows == 0)
    {   
        $check = true;
        $query = "INSERT INTO `individual` (`unique_id`, `name`, `roll_no`, `password`, `role`, `event_array`) VALUES (NULL, '$name', '$roll_no', '$password', 'faculty', '');";
        $bool = mysqli_query($con, $query);
        if(!$bool)
            $check = false;
        $table_name1 = $roll_no."_timetable";
        $table_name2 = $roll_no."_events";
        $sql1 = "CREATE TABLE `adiutor`.`$table_name1` ( `unique_id` INT NOT NULL AUTO_INCREMENT , `title` TEXT NOT NULL , `description` TEXT NOT NULL , `datetime` DATETIME NOT NULL , PRIMARY KEY (`unique_id`)) ENGINE = InnoDB; ;";
        $bool = mysqli_query($con, $sql1);
        if(!$bool)
            $check = false;
        $sql2 = "CREATE TABLE `adiutor`.`$table_name2` ( `unique_id` INT NOT NULL AUTO_INCREMENT , `title` TEXT NOT NULL , `description` TEXT NOT NULL , `datetime` DATETIME NOT NULL , PRIMARY KEY (`unique_id`)) ENGINE = InnoDB; ;";
        $bool = mysqli_query($con, $sql2);
        if(!$bool)
            $check = false;
        if($check)
            echo "<h2> Added\n </h2>";
        else
            echo "<h2> Problem Insertion\n </h2>";
    }
    else
    {
        echo "<h2> Roll number already exists </h2>";
    }
}
?>
    <hr>
    </div>
    <div class="col-sm-2 sidenav">
    </div>
</div>
</div>
<footer class="container-fluid text-center">
    <p>Adiutor by IIT Dharwad </p>
</footer>

</body>