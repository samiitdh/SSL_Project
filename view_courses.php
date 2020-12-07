<?php
session_start();
      include './dbcom.php';
      $sql = "SELECT * FROM courses ";
      $result = mysqli_query($con,$sql);
      
      $pizzas = mysqli_fetch_all($result,MYSQLI_ASSOC);
      mysqli_free_result($result);

      mysqli_close($con);
      ?>
      <style>
  td,th{
border:1px solid black;
width:20%;
text-align:center;
padding:5px;
}
table{
  margin: auto;
  
border-collapse:collapse;
}
.special{
  font-weight: bold;
}
.container{
  /* background-color:red; */
  /* margin:500; */
  width:50px;
  height:50px;
}
button{
  margin:auto;
  display:flex;
  align-items:center;
  justify-content:center;
  background-color:red;
  text-align:center;
  left:40%;
}
h2{
  margin:0 auto;
  align-items:center;
  justify-content:center;
  text-align:center;
}
  </style>
      <table>
      <tr>
      <td>Course Name</td>
      <td>proffesor Name</td>
      <td>proffesor roll number</td>
      <td>delete</td>
      </tr>
      <?php foreach ($pizzas as $pizza) { ?>
        <tr>
          <td class="special"><?php echo $pizza['name']; ?></td>
          <td class="special"><?php echo $pizza['instuctor']; ?></td>
          <td class="special"><?php echo $pizza['roll_number']; ?></td>
          <td>
          <?php 
            $id = $pizza['id'];
          ?>
          <form action="./delete_course.php" method="POST">
            <input type="hidden" name ="id_with" value="<?php echo $id; ?>" />
            <button type ="submit" name = "course_delete" value="A_delete" class = "special">Delete</button>
          </form>
          </td>
        </tr>
      <?php }?>
      </table>
      <form action = "./add_courses.php" method = "POST">
         <button type = "submit" name = "add_course"> Add Course </button>
      </form>
  <form method = "POST" action = "./home_admin.php">
        <button type ="submit">Go back</button>
  </form>