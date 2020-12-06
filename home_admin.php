<?php

if(isset($_POST['add_individual'])){
    header('location:add_individual.php');
}

if(isset($_POST['viewAdelete'])){
    header('location:admin_view.php');
}

if(isset($_POST['room'])){
    header('location:admin_room.php');
}

?>
<form method = "POST" action = "./logout.php">
    <button type ="submit">go</button>
</form>
<form method = "POST" action = "home_admin.php">
    <button type ="submit" name = "add_individual">Add Individual</button>
    <button type ="submit" name = "viewAdelete">View Existing Individual</button>
    <button type ="submit" name = "room">Room Occupency</button>
</form>
