<?php
session_start();
include './dbcom.php';

$insert = " insert into individual(name,roll_no,password,role,event_array) values('admin','69420','phpmyadmin','admin','')";

$res = mysqli_query($con,$insert);

?>