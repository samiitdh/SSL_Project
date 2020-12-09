<?php
session_start();
    if(isset($_POST['Add_std'])){
        $id = $_POST['id_course'];
        $roll_no = $_POST['student_id'];
        $table_name = "{$id}_course";
        include './dbcom.php';
        $sql = " select * from individual where roll_no = '$roll_no' ";
        $result = mysqli_query($con,$sql);
        $result_count = mysqli_num_rows($result);
        if($result_count == 1){
        $insert = " insert into {$table_name}(name,roll_no,unique_id) values('','$roll_no','')";
        $res = mysqli_query($con,$insert);

    if($res){
        ?>
        <script>
            alert("Added successfully");
            location.replace("add_students.php");
        </script>
        <?php
    }
    else{
        ?>
        <script>
            alert("Error!");
            location.replace("add_students.php")
        </script>
        <?php
    }
    }
    else{
        ?>
        <script>
            alert("Error!");
            location.replace("add_students.php");
        </script>
        <?php   
    }
}
//mysqli_close($con);
?>