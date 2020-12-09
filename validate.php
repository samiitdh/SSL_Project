<?php
  session_start();
?>
<?php 
    include './dbcom.php';
    if(isset($_POST['submit'])){

        $username = $_POST['roll_no'];
        $password = $_POST['password'];


        $username_search =" select * from individual where roll_no = '$username' ";
        $query = mysqli_query($con,$username_search);

        $email_count = mysqli_num_rows($query);
        if($email_count){
            $email_pass = mysqli_fetch_assoc($query);
            $dbpass = $email_pass['password'];

            $_SESSION['roll_no'] = $email_pass['roll_no'];
            // $pass_decode = password_verify($password,$dbpass);

            if($password == $dbpass){
                //remember user 
                if(isset($_POST['rememberme'])){
                    setcookie('usernameCook',$username,time() + 86400 *7);
                    setcookie('passwordCook',$password,time() + 86400 *7);
                    if($username[0] == "9"){
                        // to home_faculty.php
                        header('location:home_faculty.php');
                    }
                    else if($username == "69420"){
                        $_SESSION['admin'] =1;
                        // to home_admin.php
                    
                        unset($_SESSION["password"]);
                        unset($_SESSION["user"]);
                        header('location:home_admin.php');
                    }
                    else{
                        // to home_student.php
                        header('location:home_student.php');
                    }
                }
                else{
                    $_SESSION['admin'] =1;
                    if($username[0] == "9"){
                        // to home_faculty.php
                        $_SESSION['roll_no'] = $_POST['roll_no'];
                        header('location:home_faculty.php');
                    }
                    else if($username == "69420"){
                        // to home_admin.php
                        header('location:home_admin.php');
                    }
                    else{
                        // to home_student.php
                        header('location:home_student.php');
                    }
                }
            }else{
                $_SESSION['password'] = 1;
                unset($_SESSION["user"]);
                header('location:index.php');
            }
        }else{
            $_SESSION['user'] =1;
            unset($_SESSION["password"]);
            header('location:index.php');
        }

    }
    ?>