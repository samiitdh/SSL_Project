<?php

include_once 'dbcom.php';

$roll_no = $_POST['roll_no'];
$old_pass = $_POST['old_passwd'];
$new_pass = $_POST['new_passwd'];

$sql = "SELECT `password` FROM `individual` WHERE `roll_no`=$roll_no;";
$result = mysqli_query($con, $sql);
$num_rows = mysqli_num_rows($result);
if($num_rows > 0)
{
    $row = mysqli_fetch_assoc($result);
    $old = $row['password']; 
    if($old == $old_pass)
    {
        $sql = "UPDATE `individual` SET `password`='$new_pass' WHERE `roll_no`=$roll_no;";
        $result = mysqli_query($con, $sql);
        if($result)
        {
            echo "Password Changed";
        }
        else
        {
            echo "Problem Changing Password!";
        }
    } 
    else
    {
        echo "Old Password Incorrect";
    }  
}
else
{
    echo "Please enter roll number correctly";
}
?>
<form action='change_pswd.php' method='POST'>
    <label> 
        <input type="submit" value="Click here to go back"> 
    </label>
</form>
