<?php
include 'admin/include/dbcon.php';
if(!isset($_GET['token'])){
    ?>
    <script>location.replace('index.php')</script>
    <?php
}
$token = $_GET['token'];
$password = $_POST['password'];
$cpassword = $_POST['cpassword'];
if($password==$cpassword){
    // change the password in db
    $hash = password_hash($password,PASSWORD_BCRYPT);
    $query = "update users set userpassword='$hash' where token='$token'";
    $run = mysqli_query($con,$query);
    if($run){
        // password updated successfully
        ?>
        <script>
            alert("password has been updated. Please login with new password.");
            location.replace('index.php');
        </script>
        <?php
    }else{
        // password not updated
        ?>
        <script>
            alert("SORRY ! can't update your password at the moment.");
            location.replace('index.php');
        </script>
        <?php
    }
}else{
    // passwords are not matching
    ?>
    <script>
        alert("entered passwords do not match");
        location.replace('x.php?token=<?php echo $token; ?>');
    </script>
    <?php
}
?>