<?php
include 'include/dbcon.php';
if(isset($_POST['login'])){
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $emailquery = "select * from admins where adminemail='$email'";
    $selectedmail = mysqli_query($con, $emailquery);
    $countemail = mysqli_num_rows($selectedmail);
    if($countemail==0){
        ?>
        <script>
            alert("invalid email");
            location.replace('index.php');
        </script>
        <?php
    }else{
        $res = mysqli_fetch_assoc($selectedmail);
        $dbpassword=$res['adminpassword'];
        $decode = password_verify($password,$dbpassword);
        if($decode){
            // redirect to dashboard
            session_start();
            $_SESSION['adminname']=$res['adminname'];
            $_SESSION['adminemail']=$email;
            $_SESSION['adminid']=$res['adminid'];
            $_SESSION['adminpassword']=$res['adminpassword'];
            $_SESSION['adminunhashedpassword']=$password;   
            ?>
            <script>
                location.replace('admindashboard.php');
            </script>
            <?php
        }else{
            ?>
            <script>
            alert("invalid password");
            location.replace('index.php');
            </script>
            <?php
        }
    }
}
?>