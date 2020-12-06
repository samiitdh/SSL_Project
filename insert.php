<?php
session_start();
include './dbcom.php';

$insert = " insert into individual(name,roll_no,password,role,event_array) values('admin','69420','phpmyadmin','admin','')";

$res = mysqli_query($con,$insert);

if($res){
    ?>
    <script>
        alert("data gone");
    </script>
    <?php
}
else{
    ?>
    <script>
        alert("data not gone");
    </script>
    <?php
}
$insert_2 = " insert into individual(name,roll_no,password,role,event_array) values('ad','190030026','php','admin','')";

$res_2 = mysqli_query($con,$insert_2);
?>