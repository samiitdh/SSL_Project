<?php

$connect = mysqli_connect("localhost", "root", "") or die("Connection failed");

$write = mysqli_query($connect,"CREATE DATABASE IF NOT EXISTS adiutor;");
$connect = mysqli_connect("localhost", "root", "","adiutor") or die("Connection failed");

$write = mysqli_query($connect,"CREATE TABLE `adiutor`.`events` ( `unique_id` INT NOT NULL AUTO_INCREMENT , `title` TEXT NOT NULL , `description` TEXT NOT NULL , `datetime` DATETIME NOT NULL , PRIMARY KEY (`unique_id`)) ENGINE = InnoDB; ");

$write = mysqli_query($connect,"CREATE TABLE `adiutor`.`individual` ( `unique_id` INT(255) NOT NULL AUTO_INCREMENT , `name` VARCHAR(300) NOT NULL , `roll_no` BIGINT(11) NOT NULL , `password` VARCHAR(32) NOT NULL , `role` VARCHAR(11) NOT NULL , `event_array` MEDIUMTEXT NOT NULL , PRIMARY KEY (`unique_id`)) ENGINE = InnoDB; ");

$write = mysqli_query($connect,"CREATE TABLE `adiutor`.`event_requests` ( `unique_id` INT NOT NULL AUTO_INCREMENT , `title` TEXT NOT NULL , `description` TEXT NOT NULL , `datetime` DATETIME NOT NULL , PRIMARY KEY (`unique_id`)) ENGINE = InnoDB; ");

$write = mysqli_query($connect,"CREATE TABLE `adiutor`.`courses` ( `id` INT(255) NOT NULL AUTO_INCREMENT , `name` VARCHAR(255) NOT NULL , `instructor` VARCHAR(255) NOT NULL , `roll_number` VARCHAR(255) NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;");

$write = mysqli_query($connect, "CREATE TABLE `adiutor`.`rooms` ( `unique_id` INT NOT NULL AUTO_INCREMENT , `date` DATE NOT NULL , `room_no` INT NOT NULL , `from_time` TIME NOT NULL , `to_time` TIME NOT NULL , `owner` TEXT NOT NULL , PRIMARY KEY (`unique_id`)) ENGINE = InnoDB;");

$write = mysqli_query($connect, "CREATE TABLE `adiutor`.`room_reqs` ( `unique_id` INT NOT NULL AUTO_INCREMENT , `date` DATE NOT NULL , `room_no` INT NOT NULL , `from_time` TIME NOT NULL , `to_time` TIME NOT NULL , `owner` TEXT NOT NULL , PRIMARY KEY (`unique_id`)) ENGINE = InnoDB;");

include './dbcom.php';

$insert = " insert into individual(name,roll_no,password,role,event_array) values('admin','69420','phpmyadmin','admin','')";

$res = mysqli_query($con,$insert);

?>