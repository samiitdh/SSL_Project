<?php
$roll_no = $_SESSION['roll_no'];
echo "<form action='view_events.php'><input type=submit value='Events'></form>";
echo "<form action='change_pswd.php?roll_no=$roll_no' method='get'><input type=submit value='Change Password'></form>";
?>
