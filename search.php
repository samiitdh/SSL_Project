<html>
<head>
    <title> Existing Individuals </title> 
    <meta charset="utf-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <style>
      body {
   margin:0;
   padding:0;
   height:100%;
   min-height: 100%;
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
  <h3>Existing Individuals</h3>
  <p> Use delete button to delete individual </p>
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
            <form action='admin_view.php' method='POST'>
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
  if(isset($_POST['search_button'])){
      $input = $_POST['search'];
      include './dbcom.php';
      $sql = "SELECT * FROM individual WHERE name LIKE '%$input%' OR roll_no LIKE '%$input%'";
      $result = mysqli_query($con,$sql);
      $pizzas = mysqli_fetch_all($result,MYSQLI_ASSOC);
      mysqli_free_result($result);

      mysqli_close($con);
      ?>
      <table class="table table-striped">
      <thead>
        <tr>
          <th>Roll Number</th>
          <th>Name</th>
          <th>Delete</th>
        </tr>
      </thead>
      <?php foreach ($pizzas as $pizza) { ?>
      <?php
       if($pizza['roll_no'] != "69420"){ ?>
        <tr>
          <td class="special"><?php echo $pizza['roll_no']; ?></td>
          <td class="special"><?php echo $pizza['name']; ?></td>
          <td>
          <?php
          $id = $pizza['roll_no'];
          $roll = $pizza['roll_no'];
          ?>
          <form action="./delete.php" method="POST">
            <button class="btn btn-danger" type ="submit" value=<?= $id?> name="A_delete" > Delete </button>
          </form>
          </td>
        </tr>
      <?php }?>
      <?php }?>
      </table>
      <?php  }  
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