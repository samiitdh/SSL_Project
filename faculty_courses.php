<?php
require('init.php');

if(isset($_GET['action']))
{
  $id = $_GET['id'];
  $title = $_GET['title'];
  $dt = $_GET['datetime'];
  $des = $_GET['description'];
  $q = mysqli_query($connect,"DELETE FROM {$id}_courses WHERE title=$title AND (description=$description AND datetime=$datetime) ");
}


$rollno = $_SESSION['roll_no'];
$extract = mysqli_query($connect, "SELECT FROM individual WHERE roll_no='$rollno'");
$inst = "";
while ($row = mysqli_fetch_assoc($extract))
{
  $inst = $row['name'];
}
$extract = mysqli_query($connect, "SELECT FROM courses WHERE instructor = $inst");
echo "<form action='faculty_courses.php' method=post><select name='id'>";
while($row = mysqli_fetch_assoc($extract))
{
  $name = $row['name'];
  $uid = $row['unique_id'];
  $insructor = $row['instructor'];
  if (isset($name))
  {
    if($inst == $instructor)
    {
      echo "<option value='$uid'>$name</option>";
    }
  }
}
echo "</select><input type=submit></form>";
if(isset($_POST['id']))
{
  $id = $_POST['id'];
  $extract = mysqli_query($connect, "SELECT * FROM {$id}_courses");
  echo "<h3>Room List</h3>";
  echo "<table><tr><th>Title</th><th>Description</th><th>Date and Time</th><th>Delete</th></tr>";
  while($row = mysqli_fetch_assoc($extract))
  {
    $title = $row['title'];
    $description = $row['description'];
    $datetime = $row['datetime'];
    echo "<tr><td>$title</td><td>$description</td><td>$datetime</td><td><a href = 'faculty_courses.php?action=1&id=$id&title=$title&datetime=$datetime&description=$description'>Delete</a></td></tr>";
  }
  echo "</table>";
}
echo "<form action='new_deadline.php'><input type=submit value='Add a Deadline to a Course'></form>";
 ?>
