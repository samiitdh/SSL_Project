<?php

session_start();
if(isset($_POST['deadline_time'])){
    $roll = $_SESSION['roll_no'];
    include './dbcom.php';
    $course_name = $_POST['name'];
    $course_des = $_POST['des'];
    $course_time = $_POST['time'];
    $table_name = "{$roll}_deadlines";
    $insert = " insert into {$table_name}(title,description,datetm) values('$course_name','$course_des','$course_time')";
        $res = mysqli_query($con,$insert);

    if($res){
        ?>
        <script>
            alert("insrted sussesfully");
            location.replace("new_deadline.php");
        </script>
        <?php
    }
    else{
        ?>
        <script>
            alert("not <?php echo $table_name; ?> inserted");
            location.replace("new_deadline.php")
        </script>
        <?php
    }
}

?>