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
if(isset($_GET['action']))
{
  $title = $_GET['title'];
  $description = $_GET['description'];
  $datetime = $_GET['datetime'];
  if ($_GET['action'])
  {
    $q = mysqli_query($connect,"INSERT INTO `events` (`title`, `description`,`datetime`) VALUES ('$title', '$description','$datetime')");
  }
  $q = mysqli_query($connect,"DELETE FROM event_requests WHERE title='$title' AND (datetime='$datetime' AND description='$description')");
}

$extract = mysqli_query($connect, "SELECT * FROM event_requests");
echo "<form action='eventco_view.php'><input type=submit value='View Events'></form>";
echo "<form action='add_events.php'><input type=submit value='New Event'></form>";

echo "<h3 style='text-align: center'>Event Requests</h3>";
echo "<table><tr><th>Title</th><th>Description</th><th>Date and Time</th><th>Accept</th><th>Deny</th></tr>";
while($row = mysqli_fetch_assoc($extract))
{
  $title = $row['title'];
  $description = $row['description'];
  $datetime = $row['datetime'];
  echo "<tr><td>$title</td><td>$datetime</td><td>$description</td><td><a href = 'home_eventco.php?action=1&title=$title&datetime=$datetime&description=$description'>Accept</a></td><td><a href = 'home_eventco.php?action=0&title=$title&datetime=$datetime&description=$description'>Deny</a></td></tr>";
}
echo "</table>";
echo "</br>";
 ?>
