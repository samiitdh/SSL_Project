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
        $check = true;
        $query = "INSERT INTO `individual` (`unique_id`, `name`, `roll_no`, `password`, `role`, `event_array`) VALUES (NULL, '$name', '$roll_no', '$password', 'student', '');";
        $bool = mysqli_query($con, $query);
        if(!$bool)
            $check = false;
        $table_name1 = $roll_no."_timetable";
        $table_name2 = $roll_no."_events";
        $sql1 = "CREATE TABLE `adiutor`.`$table_name1` ( `unique_id` INT NOT NULL AUTO_INCREMENT , `title` TEXT NOT NULL , `description` TEXT NOT NULL , `datetime` DATETIME NOT NULL , PRIMARY KEY (`unique_id`)) ENGINE = InnoDB; ;";
        $bool = mysqli_query($con, $sql1);
        if(!$bool)
            $check = false;
        $sql2 = "CREATE TABLE `adiutor`.`$table_name2` ( `unique_id` INT NOT NULL AUTO_INCREMENT , `title` TEXT NOT NULL , `description` TEXT NOT NULL , `datetime` DATETIME NOT NULL , PRIMARY KEY (`unique_id`)) ENGINE = InnoDB; ;";
        $bool = mysqli_query($con, $sql2);
        if(!$bool)
            $check = false;
        if($check)
            echo "Inserted\n";
        else
            echo "Problem Insertion\n";
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