<?php 
    include_once 'dbcom.php'; 
    if(!isset($_COOKIE['date']))
    {
        $exp = time()+86400;
        $date = date("Y-m-d");
        setcookie('date', $date, $exp);
    }
    else
    {
        $date = $_POST['date'];
        $exp = time()+86400;
        setcookie('date', $date, $exp);
    }
?>

<html>
<head>
    <meta charset="UTF-8">
    <title> Room Allotments </title>
</head>
    <body>
    <h2> Rooms Information </h2>
        <form action='room_req.php' method='POST'> 
            <label> 
                <input type="submit" name="room_req" value="Click here to request a room">
            </label> 
        </form>
        <form action='faculty_room.php' method='POST'>
            <label for="date"> <b> Select date to check room occupancy </b> <br/>
                <input type="date" name="date" > <br/> <br/> 
            </label>
            <label> 
                <input type="submit" name="date_change" value="Check">
            </label>
        </form>

    </body>
</html>

<body>
    <h2 class=center> Table of Room Occupancy of <?php echo $date; ?></h2>
    <table class="tab">
        <tr>
            <th> Room Number </th>
            <th> Time </th>
            <th> Taken by </th>
        </tr> 
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
</body>
