<?php
      include './dbcom.php';
      $sql = "SELECT * FROM courses ";
      $result = mysqli_query($con,$sql);
      
      $pizzas = mysqli_fetch_all($result,MYSQLI_ASSOC);
      mysqli_free_result($result);

      mysqli_close($con);
?>
  <form action = "./student_varification.php" method = "POST">
    <select name = "id_course">
      <?php foreach ($pizzas as $pizza) { ?>
       <option value = "<?php echo $pizza['roll_number'] ?>"><?php echo $pizza['name'] ?></option>   
    <?php } ?>
     </select>
     <input name = "student_id" placeholder = "enter your roll number"/>
     <button type = "submit" name = "Add_std">Add</button>
  </form>

  <form method = "POST" action = "./home_admin.php">
        <button type ="submit">Go back</button>
  </form>