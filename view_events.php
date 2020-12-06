<?php
require('init.php');
echo "<style>table,tr,th,td
{
    text-align:center;
    border: 1px black;
    border-collapse: collapse;
    border-style: solid;
    margin-left: auto;margin-right:auto;
}</style>";

$roll_no = $_SESSION['roll_no'];
$q=mysqli_query($connect, "SELECT FROM individual WHERE roll_no=$roll_no;");
while($row = mysqli_fetch_assoc($q))
{
  $uid=$row['unique_id'];
  $role=$row['role'];
}
if(isset($_GET['action']))
{
  $title = $_GET['title'];
  $description = $_GET['description'];
  $datetime = $_GET['datetime'];

  $q = mysqli_query($connect,"INSERT INTO `{$uid}_events` (`title`, `description`,`datetime`) VALUES ('$title', '$description','$datetime');");
}

$extract = mysqli_query($connect, "SELECT * FROM events");
echo "<h3 style='text-align: center'>Posted Events</h3>";
echo "<table><tr><th>Title</th><th>Description</th><th>Date and Time</th><th>Add to Timetable</th></tr>";
while($row = mysqli_fetch_assoc($extract))
{
  $title = $row['title'];
  $description = $row['description'];
  $datetime = $row['datetime'];
  echo "<tr><td>$title</td><td>$description</td><td>$datetime</td><td><a href = 'view_events.php?action=1&title=$title&datetime=$datetime&description=$description'>Add to Timetable</a></td></tr>";
}
echo "</table>";
echo "</br>";
if(isset($role))
{
  if($role == 'studentEC' || $role == 'facultyEC')
  {
    echo "<form action='home_eventco.php'><input type=submit value='Go to Event Coordinator homepage'></form>";
  }
}
?>
