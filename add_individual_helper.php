<?php

include_once 'dbcom.php';

$name = $_POST['name'];
$roll_no = $_POST['r_number'];
$role = $_POST['role'];

if($role == "student")
{
    $password = "student"."_".$roll_no;
    $query = "SELECT `unique_id` FROM `individual` WHERE `roll_no` = '$roll_no' ;";
    $result = mysqli_query($con, $query);
    if($result->num_rows == 0)
    {
        $query = "INSERT INTO `individual` (`unique_id`, `name`, `roll_no`, `password`, `role`, `event_array`) VALUES (NULL, '$name', '$roll_no', '$password', 'student', '');";
        $bool = mysqli_query($con, $query);
        if($bool)
            echo "Inserted";
    }
    else
    {
        echo "Already Roll number exists";
    }
}
?>

<form action='add_individual.php' method='POST'>
    <label> 
        <input type="submit" value="Click here to go to previous page"> 
    </label>
</form>