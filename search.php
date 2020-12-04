<?php
session_start();
  if(isset($_POST['search_button'])){
      $input = $_POST['search'];
      include './dbcom.php';
      $sql = "SELECT * FROM individual WHERE name LIKE '%$input%' OR roll_no LIKE '%$input%'";
      $result = mysqli_query($con,$sql);
      $pizzas = mysqli_fetch_all($result,MYSQLI_ASSOC);
      mysqli_free_result($result);

      mysqli_close($con);
      ?>
      <table>
      <tr>
      <td>roll number</td>
      <td>Name</td>
      <td>delete</td>
      </tr>
      <?php foreach ($pizzas as $pizza) { ?>
        <tr>
          <td class="special"><?php echo $pizza['roll_no']; ?></td>
          <td class="special"><?php echo $pizza['name']; ?></td>
          <td>
          <?php
          $id = $pizza['unique_id'];
          ?>
          <form action="./delete.php" method="POST">
            <input type="hidden" name ="id_with" value="<?php echo $id; ?>" />
            <button type ="submit" name = "A_delete" value="A_delete">Delete</button>
          </form>
            <td>
            <!-- <a href = "delete.php?rn=<?php echo $pizza['id']; ?>"> Delete -->
            </td>
          </td>
        </tr>
      <?php }?>
      </table>
      <?php  }  
  ?>
  <form method = "POST" action = "./home_admin.php">
        <button type ="submit">Go back</button>
  </form>