<?php
require('init.php');
if(isset($_POST['submit']))
{
  $title = $_POST['title'];
  $description = $_POST['description'];
  $datetime = $_POST['datetime'];
  $q = mysqli_query($connect,"INSERT INTO `events` (`title`, `description`,`datetime`) VALUES ('$title', '$description','$datetime')");
}

echo "<h3> Add a new event here</h3>";
echo "<form action='add_events.php' method=post>Title: <input type=text name=title></br>";
echo "Description: <input type=text name=description></br>";
echo "Date and Time (Format: YYYY-MM-DD 29:59:59): <input type=text name=datetime></br>";
echo "<input type=submit value='Add' name='submit'></form>";
 ?>
