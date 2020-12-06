<?php
session_start();
$roll = $_SESSION['roll_no'];
include './dbcom.php';
$table_name = "{$roll}_courses";
$sql = "SELECT * FROM {$table_name} ";
$result = mysqli_query($con,$sql);

$pizzas = mysqli_fetch_all($result,MYSQLI_ASSOC);
mysqli_free_result($result);

mysqli_close($con);
?>

<form action = "./deadline_varification.php" method = "POST">
<select name = "id_course">
      <?php foreach ($pizzas as $pizza) { ?>
       <option value = "<?php echo $pizza['name'] ?>"><?php echo $pizza['name'] ?></option>   
    <?php } ?>
</select>
<input type = "text" name = "des" placeholder = "Enter description">
<input type = "time" name = "time" placeholder = "Enter time">
<button type = "submit" name ="deadline_time">Submit</button>
</form>

<form action = "./faculty_courses.php">
 <button>Go back</button>
</form>