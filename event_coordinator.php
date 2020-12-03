<?php include_once 'dbcom.php'; ?>

<html>
<head>
    <meta charset="UTF-8">
    <title> event_coordinator </title>
</head>
    <body>
    <h2> Please enter relevant information </h2>
        <form action='event_coordinator_helper.php' method='POST'>
            <label for="r_number"> <b> Roll Number </b> <br/>
                <input type="number" name="r_number"> <br/> <br/> 
            </label>  
            <label> 
                <input type="submit" name="add_EC" value="Add">
            </label>
        </form>
    </body>
</html>

<body>
    <h2 class=center> Table of Event Coordinators </h2>
    <table class="tab">
        <tr>
            <th> Name </th>
            <th> Roll Number </th>
            <th> Remove Event Coordinator Role </th>
        </tr> 
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
                                    <button type="submit" name="delete_EC" value=<?= $row['unique_id'] ?>> Remove role </button>
                                </label>
                            </form>
                        </td>
                    </tr>
                    <?php
                }
            }
        ?>
    </table>
</body>
