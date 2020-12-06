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

if(isset($_GET['action']))
{
  $roomno=$_GET['roomno'];
  $date=$_GET['date'];
  $time=$_GET['time'];
  $owner=$_GET['owner'];
  if ($_GET['action'])
  {
    $q = mysqli_query($connect,"INSERT INTO `rooms` (`room_no`, `date`,`time`,`owner`) VALUES ('$roomno', '$date','$time','$owner')");
  }
  $q = mysqli_query($connect,"DELETE FROM room_reqs WHERE room_no='$roomno' AND (date='$date' AND (owner='owner' AND time='$time')");
}
$q = mysqli_query($connect, "SELECT * FROM room_reqs");

echo "<h3 style='text-align: center'>Room Requests</h3>";
echo "<table><tr><th>Room Number</th><th>Date</th><th>Time</th><th>Requested By</th><th>Accept</th><th>Deny</th></tr>";
while($row = mysqli_fetch_assoc($q))
{
  $roomno=$row['room_no'];
  $date=$row['date'];
  $time=$row['time'];
  $owner=$row['owner'];
  echo "<tr><td>$roomno</td><td>$date</td><td>$time</td><td>$owner</td></tr><td><a href = 'admin_roomreq.php?action=1&roomno=$roomno&date=$date&time=$time&owner=$owner'>Accept</a></td><td><a href = 'admin_roomreq.php?action=0&roomno=$roomno&date=$date&time=$time&owner=$owner'>Deny</a></td></tr>";
}
echo "</table>";
echo "</br>";
