<?php
require('init.php');
$roll_no = $_SESSION['roll_no'];
echo "<form action='view_events.php'><input type=submit value='Events'></form>";
echo "<form action='change_pswd.php?roll_no=$roll_no' method='get'><input type=submit value='Change Password'></form>";
echo "<form action='faculty_room.php'><input type=submit value='View Room Allotment'></form>";
echo "<form action='faculty_courses.php'><input type=submit value='View My Courses'></form>";
echo "<form action='faculty_deadlines.php'><input type=submit value='View Deadlines of all the Courses'></form>";

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

$extract = mysqli_query($connect, "SELECT FROM individual WHERE roll_no='$roll_no'");
$id = "";
while ($row = mysqli_fetch_assoc($extract))
{
  $id = $row['unique_id'];
}

if (isset($_GET['action']))
{
  if($_GET['action'])
  {
    $title = $_GET['title'];
    $description = $_GET['description'];
    $datetime = $_GET['datetime'];
    $q = mysqli_query($connect,"DELETE FROM {$id}_deadlines WHERE (title='$title' AND (datetime='$datetime' AND description='$description'))");
  }
  else
  {
    $title = $_GET['title'];
    $description = $_GET['description'];
    $datetime = $_GET['datetime'];

    $q = mysqli_query($connect,"DELETE FROM {$id}_events WHERE (title='$title' AND (datetime='$datetime' AND description='$description'))");
  }
}

$extract = mysqli_query($connect,"SELECT * FROM courses");
echo "<h3>Deadlines</h3>";
echo "<table><tr><td>Title</td><td>Description</td><td>Date and Time</td><td>Mark as Done</td></tr>";
while ($row = mysqli_fetch_assoc($extract))
{
  $cid = $row['unique_id'];
  $q = mysqli_query($connect,"SELECT * FROM {$cid}_courses");
  $flag = 0;
  while($r = mysqli_fetch_assoc($q))
  {
    if ($cid == $r['unique_id'])
    {
      $flag = 1;
      break;
    }
  }
  if($flag == 1)
  {
    $q = mysqli_query($connect,"SELECT * FROM {$cid}_deadlines");
    while($r = mysqli_fetch_assoc($q))
    {
      $t=$r['title'];
      $des = $r['description'];
      $dt = $r['datetime'];
      $flag1 = 1;
      $sq = mysqli_query($connect,"SELECT * FROM {$id}_deadlines");
      while($r1 = mysqli_fetch_assoc($sq))
      {
        if ($t == $r1['title'] && $des == $r1['description'] && $dt == $r1['datetime'])
        {
          $flag1 = 0;
        }
      }
      if ($flag1)
      {
        echo "<tr><td>$t</td><td>$des</td><td>$dt</td><td><a href = 'home_student.php?action=1&title=$t&datetime=$dt&description=$des'>Mark as Done</a></td></tr>";
      }
    }
  }
}
echo "</table>";


if($id != '')
{
  $extract = mysqli_query($connect, "SELECT * FROM {$id}_events");

  echo "<h3 style='text-align: center'>My Events</h3>";
  echo "<table><tr><th>Title</th><th>Description</th><th>Date and Time</th><th>Delete</th></tr>";
  while($row = mysqli_fetch_assoc($extract))
  {
    $title = $row['title'];
    $description = $row['description'];
    $datetime = $row['datetime'];
    echo "<tr><td>$title</td><td>$description</td><td>$datetime</td><td><a href = 'home_student.php?action=0&title=$title&datetime=$datetime&description=$description'>Delete</a></td></tr>";
  }
  echo "</table>";
  echo "</br>";
}

?>
