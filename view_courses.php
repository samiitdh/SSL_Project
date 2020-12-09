<html>
<head>
    <title> View Courses </title> 
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
  <h3>Existing Courses</h3>
  <p> Check the table </p>
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

<?php
session_start();
      include './dbcom.php';
      $sql = "SELECT * FROM courses ";
      $result = mysqli_query($con,$sql);
      
      $pizzas = mysqli_fetch_all($result,MYSQLI_ASSOC);
      mysqli_free_result($result);

      mysqli_close($con);
    ?>
<body>
<div class="container-fluid text-center">    
    <div class="row content">
        <div class="col-sm-2 sidenav">
        </div>
        <div class="col-sm-8 text-left">
    <table class="table table-striped">
    <thead>
        <tr>
            <th>Course Name</th>
            <th>Course Instructor</th>
            <th>Instructor Roll Number</th>
            <th>Delete</th>
        </tr>
    </thead>
    <?php foreach ($pizzas as $pizza) { ?>
    <tr>
        <td><?php echo $pizza['name']; ?></td>
        <td><?php echo $pizza['instructor']; ?></td>
        <td><?php echo $pizza['roll_number']; ?></td>
        <td>
        <?php 
        $id = $pizza['id'];
        $roll_no = $pizza['roll_number'];
        ?>
        <form action="./delete_course.php" method="POST">
        <input type="hidden" name ="id_with" value="<?php echo $id; ?>" />
        <input type="hidden" name ="roll_no" value="<?php echo $roll_no; ?>" />
        <button type ="submit" name = "course_delete" value="A_delete" class="btn btn-danger" >Delete</button>
        </form>
        </td>
    </tr>
    <?php }?>
    <hr>
    </table>
    <form action = "./add_courses.php" method = "POST">
        <button class="btn btn-info" type = "submit" name = "add_course"> Add Course </button>
    </form>
 
            <hr>
        </div>
        <div class="col-sm-2 sidenav">
        </div>
    </div>
</div>

<footer class="container-fluid text-center">
  <p>Adiutor by IIT Dharwad </p>
</footer>

</body