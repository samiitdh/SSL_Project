<?php

if(isset($_POST['add_event'])){
    header('location:add_individual.php');
}

if(isset($_POST['viewAdelete'])){
    header('location:admin_view.php');
}

?>
<form method = "POST" action = "./logout.php">
    <button type ="submit">go</button>
</form>
<form method = "POST" action = "">
    <button type ="submit" name = "add_event">Add some</button>
    <button type ="submit" name = "viewAdelete">view and delete</button>
</form>