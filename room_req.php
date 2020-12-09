<html>
<head>
    <meta charset="UTF-8">
    <title> Room Request </title>
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
  <h3>Room Request</h3>
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
            <form action='faculty_room.php' method='POST'>
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

include_once 'dbcom.php';

if(array_key_exists("room_submit", $_POST))
{   
    $date = $_POST['date'];
    $room_no = $_POST['room_no'];
    $from_time = $_POST['from_time'].":00";
    $to_time = $_POST['to_time'].":00";
    $owner = $_POST['owner'];

    $sql = "INSERT INTO `room_reqs` (`date`, `room_no`, `from_time`, `to_time`, `owner`, `unique_id`) VALUES ('$date', '$room_no', '$from_time', '$to_time', '$owner', NULL) ;";
    $result = mysqli_query($con, $sql);
    if($result)
        echo "Room Request Submitted\n";
    else    
        echo "Problem submitting request\n";
}

?>
<html>
<head>
    <meta charset="UTF-8">
    <title> Room Request </title>
</head>
    <body>
        <br>
        <form action='room_req.php' method='POST'>
        <div class="form-group">
            <label for="room_no"> Room Number </label>
                <select class="form-control" id="room_no" name="room_no">
                <option value="23">23</option>
                <option value="24">24</option>
                <option value="25">25</option>
                <option value="26">26</option>
                <option value="28">28</option>
                <option value="103">103</option>
                <option value="105">105</option>
                <option value="107">107</option>
                <option value="201">201</option>
                <option value="202">202</option>
                <option value="204">204</option>
                </select> <br/> <br/>  
            <label>
        </div>
        <div class="form-group">
            <label for="date"> Date </label>
                <input class="form-control"  type="date" name="date"required="" > <br/> <br/> 
        </div>
        <div class="form-group">    
            <label for="from_time"> From Time </label>
                <input class="form-control"  type="time" name="from_time" required=""> <br/> <br/> 
        </div>
        <div class="form-group">              
            <label for="to_time"> To Time </label>
                <input class="form-control"  type="time" name="to_time" required=""> <br/> <br/> 
        </div>
        <div class="form-group">   
            <label for="owner"> Owner/Roll number </label>
                <input class="form-control"  type="text" name="owner" required=""> <br/> <br/> 
        </div>
        <div class="form-group">    
            <label> 
                <input class="btn btn-info" id="room_submit" name="room_submit" type="submit" value="Submit"> 
            </label>
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
