<html>
<head>
	<title>Existing Individuals</title>
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
		<h3>Existing Individuals</h3>
		<p>Check Faculty and Students table</p>
	</div>
	<nav class="navbar navbar-inverse">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar"> <span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span> 
				</button>
			</div>
			<div class="collapse navbar-collapse" id="myNavbar">
				<ul class="list-inline" class="nav navbar-nav">
					<form action='home_admin.php' method='POST'>
						<li>
							<button style="float: left; margin-right:16px" type="submit" class="btn btn-info" value="Go back">Back</button>
						</li>
					</form>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<form method="POST" action="./logout.php">
						<li>
							<button class="btn btn-danger" type="submit">Log Out</button><span class="glyphicon glyphicon-log-in"></span>
						</li>
					</form>
				</ul>
			</div>
		</div>
  </nav>
  
  <?php session_start(); 
  include './dbcom.php'; 
  $sql='SELECT * FROM individual'; 
  $result=mysqli_query($con,$sql); 
  if($result)
  { 
    $pizzas=mysqli_fetch_all($result,MYSQLI_ASSOC); 
  } 
  else
  { 
    echo "error"; 
  } 
  mysqli_free_result($result); 
  $faculty=array(); 
  $student=array(); 
  foreach ($pizzas as $pizza) 
  { 
    if($pizza[ 'roll_no'][0]=="9" )
    { 
      array_push($faculty,$pizza); 
    } 
  else if($pizza[ 'roll_no'] != 69420)
  { 
    array_push($student,$pizza); 
  } 
  } 
  ?>
	<div class="container-fluid text-center">
		<div class="row content">
			<div class="col-sm-2 sidenav"></div>
			<div class="col-sm-8 text-left">
				<h3> Search or delete individuals </h3>
				<form action="./search.php" method="post">
					<div class="form-group">
						<input class="form-control" type="text" name="search" />
					</div>
					<div class="form-group">
						<button class="btn btn-primary" type="submit" name="search_button">Search</button>
					</div>
				</form>
				<hr>
				<h2>Table of Faculty</h2>
				<table class="table table-striped">
					<thead>
						<tr>
							<th>Roll Number</th>
							<th>Name</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($faculty as $pizza) { ?>
						<tr>
							<td class="special">
								<?php echo $pizza[ 'roll_no'] ?>
							</td>
							<td class="special">
								<?php echo $pizza[ 'name'] ?>
							</td>
						</tr>
						<?php }?>
					</tbody>
					<hr>
				</table>
				<h2>Table of students</h2>
				<hr>
				<table class="table table-striped">
					<thead>
						<tr>
							<th>Roll Number</th>
							<th>Name</th>
						</tr>
					</thead>
					<?php foreach ($student as $pizza) { ?>
					<tr>
						<td class="special">
							<?php echo $pizza[ 'roll_no'] ?>
						</td>
						<td class="special">
							<?php echo $pizza[ 'name'] ?>
						</td>
					</tr>
					<?php }?>
				</table>
			</div>
			<div class="col-sm-2 sidenav"></div>
		</div>
	</div>
	<footer class="container-fluid text-center">
		<p>Adiutor by IIT Dharwad</p>
	</footer>
</body>

</html>