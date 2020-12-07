<?php
session_start();
if(isset($_POST["add_it"])){
    $name = $_POST["course_name"];
    $ins = $_POST["course_ins"];
    $roll = $_POST["course_roll"];

    if($roll[0] == "9"){
        include './dbcom.php';
        $sql = " select * from individual where roll_no = '$roll' ";
        $result = mysqli_query($con,$sql);
        $result_count = mysqli_num_rows($result);
        if($result_count == 0){
            ?>
            <script>
                alert("username not exits");
                location.replace("add_courses.php");
            </script>
            <?php
        }
        else if($result_count > 1){
            ?>
            <script>
                alert("can't add");
                location.replace("add_courses.php");
            </script>
            <?php
        }
        else{
            // $pizzas = mysqli_fetch_all($result,MYSQLI_ASSOC);
            // mysqli_free_result($result);
            // $id = $pizzas[0]['name'];
            $insert = " insert into courses(name,instuctor,roll_number) values('$name','$ins','$roll')";
            
            $res = mysqli_query($con,$insert);
            if($res){   
                $table_name = "{$roll}_course";
                $sqli = "CREATE TABLE {$table_name} (
                id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                name VARCHAR(30) NOT NULL,
                roll_no VARCHAR(30) NOT NULL,
                unique_id INT(11) NOT NULL)";
                if ($con->query($sqli) === TRUE) {
                    $table_name2 = "{$roll}_deadlines";
                    $sqli2 = "CREATE TABLE {$table_name2} (
                    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                    title VARCHAR(30) NOT NULL,
                    description VARCHAR(255) NOT NULL,
                    datetm DATETIME NOT NULL)";
                if ($con->query($sqli2) === TRUE) {
                ?>
                <script>
                alert("new course is added");
                location.replace("view_courses.php");
                </script>
                <?php
                }
                else{
                    ?>
                <script>
                alert("deadline is not added");
                location.replace("view_courses.php");
                </script>
                <?php
                }
            } else {
                echo "Error creating table: " . $con->error;
                ?>
                <script>
                alert("course can't be added <?php echo $idd ?> try again");
                location.replace("add_courses.php");
                </script>
                <?php
            }
        }
        else{
            ?>
        <script>
            alert("data not gone to table");
            location.replace("add_courses.php");
        </script>
        <?php
    // sql to create table
     }
}
}
else{
    ?>
        <script>
            alert("invalide instuctor roll_no");
            location.replace("add_courses.php");
        </script>
        <?php
}

}
?>