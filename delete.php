<?php
session_start();
include './dbcom.php';

if(array_key_exists('A_delete', $_POST))
{
    $roll = $_POST['A_delete'];
    echo "$roll";
    $sql = "DELETE FROM `individual` WHERE `roll_no` = $roll";
    $delete= mysqli_query($con, "DROP TABLE `{$roll}_timetable`;");
    $delete2= mysqli_query($con, "DROP TABLE `{$roll}_events`;");

    if(mysqli_query($con,$sql) && ($delete != FALSE) && ($delete2 != FALSE)){
        echo "done";
        header('location:admin_view.php');
    }
    else{
        echo "Problem Deleting";
        echo 'query error '.mysqli_error($con);
    } 
}
else
{
    header('location:search.php');
}
header('location:search.php');
?>
