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
echo "<form action=admin_room.php method=post>Enter Room No:<input type=text name=query></br><input type=submit value=submit></form>";

if (isset($_POST['query']))
{
    $r = $_POST['query'];
    $q = mysqli_query($connect, "SELECT * FROM rooms WHERE room_no='$r'");
    echo "<h3>Room List</h3>";
    echo "<table><tr><th>Room Number</th><th>Date</th><th>Time</th><th>Taken By</th></tr>";
    while ($row=mysqli_fetch_assoc($q))
    {
      $roomno=$row['room_no'];
      $date=$row['date'];
      $time=$row['time'];
      $owner=$row['owner'];
      echo "<tr><td>$roomno</td><td>$date</td><td>$time</td><td>$owner</td></tr>";
    }
    echo "</table>";
}
echo "<form action=admin_roomreq.php><input type=submit value='View Room Requests'></form>";
 ?>
