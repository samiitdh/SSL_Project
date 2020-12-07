<?php
session_start();

if(isset($_POST['time'])){
    include './dbcom.php';
$roll = $_SESSION['roll_no'];
$table_name = "{$roll}_deadlines";
$date = $_POST['id_course'];
$sql = "SELECT * FROM {$table_name} WHERE datetm = '$date'";
$result = mysqli_query($con,$sql);
$result_count = mysqli_num_rows($result);
if($result_count == 0){
    $a = 0;
    ?>
            <script>
                alert("no deadline");
                location.replace("faculty.php");
            </script>
            <?php
}
else{
    $a =1;
    $pizzas = mysqli_fetch_all($result,MYSQLI_ASSOC);
    mysqli_free_result($result);

    mysqli_close($con);
    foreach ($pizzas as $piz) { 
        echo $pizza['title'];
        ?> <br> <?php
    }
}


}
else{
    $a = 0;
}
?>
<?php
function create_time_range($start, $end, $interval = '1 day') {
    $startTime = strtotime($start); 
    $endTime   = strtotime($end);
    $returnTimeFormat = 'Y-m-d H:i:s';

    $current   = time(); 
    $addTime   = strtotime('+'.$interval, $current); 
    $diff      = $addTime - $current;

    $times = array(); 
    while ($startTime < $endTime) { 
        $times[] = date($returnTimeFormat, $startTime); 
        $startTime += $diff; 
    } 
    $times[] = date($returnTimeFormat, $startTime); 
    return $times; 
}
$today = date("Y-m-d H:i:s");
$year = date("Y");
$month = date("m");
$end = "$year-$month-31 23:59:00";
$time = create_time_range("$today","$end");
if($a == 0){
?>
<form action = "./faculty_deadlines.php" method = "POST">
<select name = "id_course">
      <?php foreach ($time as $pizza) { ?>
       <option value = "<?php echo $pizza ?>"><?php echo $pizza ?></option>   
    <?php } ?>
</select>
<button type = "submit" name = "time">check</button>
</form>
      <?php } ?>