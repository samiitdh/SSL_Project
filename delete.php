<?php
session_start();
include './dbcom.php';
if(isset($_POST['A_delete'])){
    $id_to_delete = $_POST['id_with'];
?>
    <script>
    var r = confirm("Are you sure you want to delete?");
        if (r == true) {
        <?php
            $sql = "DELETE FROM individual WHERE unique_id = $id_to_delete";
            if(mysqli_query($con,$sql)){
                header('location:admin_view.php');
                // echo "done";
            }
            else{
                echo 'query error '.mysqli_error($conn);
                header('location:admin_view.php');
            }
        ?>
        } else {
            
        }
    </script>
    <?php   
}
else{
    echo "no yes";
    header('location:search.php');
}


    
mysqli_close($conn);
?>