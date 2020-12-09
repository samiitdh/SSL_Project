<html>
  <head>
    <title> Add Courses 
    </title> 
    <meta charset="utf-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <style>
      .navbar {
        margin-bottom: 0;
        border-radius: 0;
      }
      .row.content {
        height: 450px}
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
        .row.content {
          height:auto;
        }
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
      <h3>Add Course
      </h3>
      <p> Fill the form 
      </p>
    </div>
    <nav class="navbar navbar-inverse">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
            <span class="icon-bar">
            </span>
            <span class="icon-bar">
            </span>
            <span class="icon-bar">
            </span>                        
          </button>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
          <ul class="list-inline" class="nav navbar-nav">
            <form action='view_courses.php' method='POST'>
              <li>
                <button style="float: left; margin-right:16px" type ="submit" class="btn btn-info" value="Go back">Back
                </button>
              </li>
            </form>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <form method = "POST" action = "./logout.php">
              <li>
                <button class="btn btn-danger" type ="submit"> Log Out 
                </button>
                <span class="glyphicon glyphicon-log-in">
                </span>
              </li>
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
          <form action = "./course_validation.php" method = "POST">
            <div class="form-group">
              <label for="course_name"> Course Name 
              </label>
              <input class="form-control" type = "text" name="course_name" placeholder = "course name"/>
            </div>
            <div class="form-group">
              <label for="course_name"> Course Instructor 
              </label>
              <input class="form-control" type = "text" name="course_ins" placeholder = "course instructor"/>
            </div>
            <div class="form-group">
              <label for="course_name"> Course Instructor Roll Number 
              </label>
              <input class="form-control" type = "text" name="course_roll" placeholder = "course instructor roll_number"/>
            </div>
            <div class="form-group">
              <button class="btn btn-primary" type = "submit" name = "add_it">Add Course
              </button>
            </div>
          </form>
        </div>
        <div class="col-sm-2 sidenav">
        </div>
      </div>
    </div>
    <footer class="container-fluid text-center">
      <p>Adiutor by IIT Dharwad 
      </p>
    </footer>
  </body>
