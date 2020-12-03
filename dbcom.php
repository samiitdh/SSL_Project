<?php

$server = "localhost";
$user = "root";
$password = "";
$db = "adiutor";

$con = mysqli_connect($server,$user,$password,$db);

if($con){
    ?>
    <!-- <script>
        alert("connection Successful");
    </script> -->

    <?php
}
else{
    ?>
    <script>
        alert("No connection");
    </script>
    <?php
}

?>

