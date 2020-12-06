<?php 

include_once 'dbcom.php';

if(array_key_exists("event_submit", $_POST))
{   
    $title = $_POST['title'];
    $description = $_POST['description'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $time = $time.":00";
    $datetime = $date." ".$time;

    $sql = "INSERT INTO `event_requests` (`title`, `description`, `datetime`) VALUES ('$title', '$description', '$datetime') ;";
    $result = mysqli_query($con, $sql);
    if($result)
        echo "Event Request Submitted\n";
    else    
        echo "Problem submitting request\n";
}

?>
<html>
<head>
    <meta charset="UTF-8">
    <title> Event Request </title>
</head>
    <body>
    <h2> Enter Relevant Information </h2>
        <form action='event_req.php' method='POST'>
            <label for="title"> <b> Title </b> <br/>
                <input type="text" name="title" > <br/> <br/> 
            </label>
            <label for="description"> <b> Description </b> <br/>
                <input type="text" name="description"> <br/> <br/> 
            </label>
            <label for="date"> <b> Date </b> <br/>
                <input type="date" name="date"> <br/> <br/> 
            </label>
            <label for="time"> <b> Time </b> <br/>
                <input type="time" name="time"> <br/> <br/> 
            </label>
            <label> 
                <input id="event_submit" name="event_submit" type="submit" value="Submit"> 
            </label>
        </form>
    </body>
</html>