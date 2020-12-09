<html>
<head>
    <meta charset="UTF-8">
    <title> Room Allotments </title>
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
  <p> Enter a date </p>
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
    include_once 'dbcom.php'; 
    if((!isset($_COOKIE['date'])) && (!array_key_exists('date', $_POST)))
    {
        $exp = time()+86400;
        $date = date("Y-m-d");
        setcookie('date', $date, $exp);
        header('Location:faculty_room.php');
    }
    else if(array_key_exists('date', $_POST))
    {
        $date = $_POST['date'];
        $exp = time()+86400;
        setcookie('date', $date, $exp);
    }
    else
    {
        $date = $_COOKIE['date'];
    }
?>
<br/>
    <form style="position: center;" action='room_req.php' method='POST'> 
        <label> 
            <input class="btn btn-info" type="submit" name="room_req" value="Click here to request a room">
        </label> 
    </form>
    <hr>
    <form action='faculty_room.php' method='POST'>
        <label for="date">Select date to check room occupancy </label>
            <input class="form-control" type="date" name="date" > <br/> <br/> 
        <label> 
            <input class="btn btn-info" type="submit" name="date_change" value="Check">
        </label>
    </form>
    <hr>
    <h2 class=center> Table of Room Occupancy of <?php echo $date; ?></h2>
    <table class="table table-striped">
        <thead>
        <tr>
            <th> Room Number </th>
            <th> Time </th>
            <th> Taken by </th>
        </tr> 
        </thead>
        <?php
            $sql = "SELECT * FROM `rooms` WHERE `date` = '$date';";
            $result = mysqli_query($con, $sql);
            $num_rows = mysqli_num_rows($result);

            if ($num_rows > 0)
            {
                while ($row = mysqli_fetch_assoc($result))
                {   
                    ?>
                    <tr>
                        <td> <?php echo $row['room_no']  ?> </td>
                        <td> <?php echo $row['from_time']." to ".$row['to_time']  ?> </td>
                        <td> <?php echo $row['owner'] ?> </td>
                    </tr>
                    <?php
                }
            }
        ?>
    </table>
    </div>
    <div class="col-sm-2 sidenav">
    </div>
  </div>
</div>

<footer class="container-fluid text-center">
  <p>Adiutor by IIT Dharwad </p>
</footer>

</body>
