<?php include_once 'dbcom.php'; ?>

<html>
<head>
    <meta charset="UTF-8">
    <title> Event Coordinator </title>
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
  <h3>Event Coordinator</h3>
  <p> Add or remove event coordinator </p>
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
    <h2> Please enter relevant information </h2>
        <form action='event_coordinator_helper.php' method='POST'>
        <div class="form-group">
            <label for="r_number"> <b> Roll Number </b> </label>
            <input class="form-control" type="number" name="r_number">
        </div>
        <div class="form-group">
            <label> 
                <input class="btn btn-primary" type="submit" name="add_EC" value="Add">
            </label>
        </div>
        </form>

    <h2 class=center> Table of Event Coordinators </h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th> Name </th>
                <th> Roll Number </th>
                <th> Remove Event Coordinator Role </th>
            </tr> 
        </thead>
        <?php
            $sql = "SELECT * FROM `individual` WHERE `role` = 'studentEC' OR `role` = 'facultyEC';";
            $result = mysqli_query($con, $sql);
            $num_rows = mysqli_num_rows($result);

            if ($num_rows > 0)
            {
                while ($row = mysqli_fetch_assoc($result))
                {   
                    ?>
                    <tr>
                        <td> <?php echo $row['name']  ?> </td>
                        <td> <?php echo $row['roll_no']  ?> </td>
                        <td> 
                            <form action='event_coordinator_helper.php' method='POST'>
                                <label> 
                                    <button class="btn btn-danger" type="submit" name="delete_EC" value=<?= $row['unique_id'] ?>> Remove role </button>
                                </label>
                            </form>
                        </td>
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

</body
