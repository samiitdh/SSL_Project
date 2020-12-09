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
        <form action='add_individual_helper.php' method='POST'>
            <div class="form-group">
                <label for="name"> Name </label>
                    <input required="" class="form-control" type="text" name="name">
            </div>
            <div class="form-group">
                <label for="r_number"> Roll Number </label>
                    <input class="form-control" type="number" name="r_number">
            </div>
            <div class="form-group">
                <label for="role">Choose a role:</label>
                    <select class="form-control" id="role" name="role">
                    <option value="student">Student</option>
                    <option value="faculty">Faculty</option>
                    </select> 
            </div>
            <div class="form-group">
                <label>
                    <input class="btn btn-primary" type="submit" value="Add Individual"> 
                </label>
            </div>
            </form>
        <hr>
        <p> Please note that the default password is: {role}_{roll number} </p>
        <p> Eg., student_190010024, faculty_180030045 </p>
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
