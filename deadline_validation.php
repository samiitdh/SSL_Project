<?php

session_start();
if(isset($_POST['deadline_time'])){
    $roll = $_SESSION['roll_no'];
    include './dbcom.php';
    $course_title = $_POST['title'];
    $course_des = $_POST['des'];
    $course_date = $_POST['date'];
    $course_time = $_POST['time'].":00";
    $datetime=$course_date." ".$course_time;
    $table_name = "{$roll}_deadlines";
    $insert = " insert into {$table_name}(title,description,datetime) values('$course_title','$course_des','$datetime')";
        $res = mysqli_query($con,$insert);

    if($res){
        ?>
        <script>
            alert("Inserted Successfully");
            location.replace("new_deadline.php");
        </script>
        <?php
    }
    else{
        ?>
        <script>
            alert("Error!");
            location.replace("new_deadline.php")
        </script>
        <?php
    }
}

?>