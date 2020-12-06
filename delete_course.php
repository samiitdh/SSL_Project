<?php
session_start();
include './dbcom.php';
if(isset($_POST['course_delete'])){
    $id_to_delete = $_POST['id_with'];
?>
        <?php
            $sql = "DELETE FROM courses WHERE id = '$id_to_delete'";
            if(mysqli_query($con,$sql)){
                ?>
                <script>
                    alert("deleted successfully");
                    location.replace("view_courses.php");
                </script>
                <?php
                // echo "done";
            }
            else{
                echo 'query error '.mysqli_error($conn);
                header('location:view_course.php');
            }

}


    
mysqli_close($conn);
?>