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
else
{
    echo "no\n";
}

?>
<html>
<head>
    <meta charset="UTF-8">
    <title> Room Request </title>
</head>
    <body>
    <h2> Enter Relevant Information </h2>
        <form action='room_req.php' method='POST'>
            <label for="room_no"> Room Number </label>
                <select id="room_no" name="room_no">
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
            <label for="date"> <b> Date </b> <br/>
                <input type="date" name="date"> <br/> <br/> 
            </label>
            <label for="from_time"> <b> From Time </b> <br/>
                <input type="time" name="from_time"> <br/> <br/> 
            </label>
            <label for="to_time"> <b> To Time </b> <br/>
                <input type="time" name="to_time"> <br/> <br/> 
            </label>
            <label for="owner"> <b> Owner/Roll number </b> <br/>
                <input type="text" name="owner"> <br/> <br/> 
            </label>
            <label> 
                <input id="room_submit" name="room_submit" type="submit" value="Submit"> 
            </label>
        </form>
    </body>
</html>