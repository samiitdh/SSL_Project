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
  <h3>Change Password</h3>
  <p> Enter Relevant Information </p> 
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

?>

<html>
<head>
    <meta charset="UTF-8">
    <title> Change Password </title>
    <script>
        function pass_check(myform)
	        {
                var roll_no = myform.roll_no.value;
                var old_pass = myform.old_passwd.value;
                var new_pass1 = myform.new_passwd.value;
                var new_pass2 = myform.new_passwd2.value;
                if(roll_no == '' || roll_no == null || old_pass == '' || old_pass == null || new_pass1 == '' || new_pass1 == null ||
                    new_pass2 =='' || new_pass2 == null)
                    alert("Fill all the fields");
                if (new_pass1 == new_pass2)
                    document.getElementById('submit').click();
		        else
                    alert("New password does not match");
	        }
    </script>
</head>
    <body>
    <h2> Enter Current and New password </h2>
        <form action='change_pswd_helper.php' method='post'>
            <div class="form-group">
                <label for="roll_no"> Roll Number</label>
                <input class="form-control" type="number" name="roll_no" value=<?= $roll_no ?> > <br/> <br/>
            </div>
            <div class="form-group">
                <label for="old_passwd"> Current Password </label>
                <input class="form-control" type="password" name="old_passwd"> <br/> <br/>
            </div>
            <div class="form-group">
                <label for="new_passwd"> New Password </label>
                <input class="form-control" type="password" name="new_passwd"> <br/> <br/>
            </div>
            <div class="form-group">
                <label for="new_passwd2"> Re-enter New Password </label>
                <input class="form-control" type="password" name="new_passwd2"> <br/> <br/>
            </div>
            <div class="form-group">
                <label> </label>
                <input class="btn btn-primary" type="button" class="btn btn-primary" onClick="pass_check(this.form)" value="Confirm">
            </div>
            <div class="form-group">
            <label style="display: none;" > </label>
                <input style="display: none;" id="submit" name="submit" type="submit" value="send">
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