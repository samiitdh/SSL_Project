<?php
  session_start();
?>
 <?php
include './dbcom.php';
$sql = 'SELECT * FROM individual';

$result = mysqli_query($con,$sql);

//fetch the resulting rows as an array
// echo $result;
// echo $result_2;
if($result){
    $pizzas = mysqli_fetch_all($result,MYSQLI_ASSOC);
}
else{
    echo "error";
}


mysqli_free_result($result);


// print_r($pizzas);
// print_r($pizzas_2);
$faculty = array();
$student = array();
foreach ($pizzas as $pizza) {
  if($pizza['roll_no'][0] == "9"){
    array_push($faculty,$pizza);
  }
  else if($pizza['roll_no'] != 69420){
    array_push($student,$pizza);
  }
}

?> 


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
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
</head>
<body>
<form action="./search.php" method="post"> 
        <input type = "text" name = "search" />
        <button type = "submit" name = "search_button">Search</button>
</form>
<h2>Table of Faculty</h2>
<table>
<tr>
<td>auther</td>
<td>publisher</td>
</tr>
<?php foreach ($faculty as $pizza) { ?>
  <tr>
    <td class="special"><?php echo $pizza['roll_no'] ?></td>
    <td class="special"><?php echo $pizza['name'] ?></td>
  </tr>
<?php }?>
</table>

<div class= "container">
  
</div>

<h2>Table of student</h2>
<table>
<tr>
<td>title</td>
<td>author</td>
<td>year</td> 
</tr>
<?php foreach ($student as $pizza) { ?>
  <tr>
    <td class="special"><?php echo $pizza['roll_no'] ?></td>
    <td class="special"><?php echo $pizza['name'] ?></td>
  </tr>
<?php }?>
</table>


<form method = "POST" action = "./home_admin.php">
        <button type ="submit">Go back</button>
  </form>
</body>
</html>