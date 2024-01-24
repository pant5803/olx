<?php
include 'include/dbcon.php';
$userid = $_GET['userid'];
$q = "select * from users where userid=$userid";
$s = mysqli_query($con,$q);
$r = mysqli_fetch_assoc($s);

if($r['status']=="active"){
    // block the user
    $query = "update users set status='blocked' where userid=$userid";
    mysqli_query($con,$query);
}else{
    // unblock the user
    $query = "update users set status='active' where userid=$userid";
    mysqli_query($con,$query);
}
?>
<script>
    location.replace('users.php');
</script>