<?php
require('init.php');
echo "<style>table,tr,th,td
{
    text-align:center;
    border: 1px black;
    border-collapse: collapse;
    border-style: solid;
    margin-left: auto;margin-right:auto;
}
form
{
  text-align:center;
}
</style>";

if (isset($_GET['title']))
{
  $title = $_GET['title'];
  $description = $_GET['description'];
  $datetime = $_GET['datetime'];

  $q = mysqli_query($connect,"DELETE FROM events WHERE (title='$title' AND (datetime='$datetime' AND description='$description'))");
}

$extract = mysqli_query($connect, "SELECT * FROM events");

echo "<h3 style='text-align: center'>Events</h3>";
echo "<table><tr><th>Title</th><th>Description</th><th>Date and Time</th><th>Delete</th></tr>";
while($row = mysqli_fetch_assoc($extract))
{
  $title = $row['title'];
  $description = $row['description'];
  $datetime = $row['datetime'];
  echo "<tr><td>$title</td><td>$datetime</td><td>$description</td><td><a href = 'eventco_view.php?title=$title&datetime=$datetime&description=$description'>Delete</a></td></tr>";
}
echo "</table>";
echo "</br>";
 ?>
