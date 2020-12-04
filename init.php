<?php

$connect = mysqli_connect("localhost", "root", "") or die("Connection failed");

$write = mysqli_query($connect,"CREATE DATABASE IF NOT EXISTS adiutor;");
$connect = mysqli_connect("localhost", "root", "","adiutor") or die("Connection failed");

$write = mysqli_query($connect,"CREATE TABLE `adiutor`.`events` ( `title` VARCHAR(60) NOT NULL , `description` MEDIUMTEXT NOT NULL , `datetime` DATETIME NOT NULL ) ENGINE = InnoDB;");

$write = mysqli_query($connect,"CREATE TABLE `adiutor`.`individual` ( `unique_id` INT(255) NOT NULL AUTO_INCREMENT , `name` VARCHAR(300) NOT NULL , `roll_no` BIGINT(11) NOT NULL , `password` VARCHAR(32) NOT NULL , `role` VARCHAR(11) NOT NULL , `event_array` MEDIUMTEXT NOT NULL , PRIMARY KEY (`unique_id`)) ENGINE = InnoDB; ");

$write = mysqli_query($connect,"CREATE TABLE `adiutor`.`event_requests` ( `title` VARCHAR(60) NOT NULL , `description` MEDIUMTEXT NOT NULL , `datetime` DATETIME NOT NULL ) ENGINE = InnoDB;");
mysqli_select_db($connect, "adiutor") or die(mysqli_error());

?>
