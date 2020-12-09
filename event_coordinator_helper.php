<?php

include_once 'dbcom.php';

if(array_key_exists("add_EC", $_POST))
{
    $roll_no = $_POST['r_number'];
    $sql = "SELECT * FROM `individual` WHERE `roll_no` = '$roll_no';";
    $result = mysqli_query($con, $sql);
    if(mysqli_num_rows($result) != 0)
    {   
        $row = mysqli_fetch_assoc($result);
        $role = $row['role'];
        if($role == 'student')
        {
            $sql = "UPDATE `individual` SET `role` = 'studentEC' WHERE `individual`.`roll_no` = '$roll_no';";
            $result = mysqli_query($con, $sql);
        }
        else if($role == 'faculty')
        {
            $sql = "UPDATE `individual` SET `role` = 'facultyEC' WHERE `individual`.`roll_no` = '$roll_no';";
            $result = mysqli_query($con, $sql);
        }
    }
    
}
else if(array_key_exists('delete_EC', $_POST))
{   
    $id = $_POST['delete_EC'];
    $sql = "SELECT * FROM `individual` WHERE `unique_id` = '$id';";
    $result = mysqli_query($con, $sql);
    if(mysqli_num_rows($result) != 0)
    {
        $row = mysqli_fetch_assoc($result);
        $role = $row['role'];
        if($role == 'studentEC')
        {
            $sql = "UPDATE `individual` SET `role` = 'student' WHERE `individual`.`unique_id` = '$id';";
            $result = mysqli_query($con, $sql);
        }
        else if($role == 'facultyEC')
        {
            $sql = "UPDATE `individual` SET `role` = 'faculty' WHERE `individual`.`unique_id` = '$id';";
            $result = mysqli_query($con, $sql);
        }
    }

}
header('Location: event_coordinator.php');
?>