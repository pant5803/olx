<?php
include 'admin/include/dbcon.php';
session_start();
if(isset($_SESSION['username'])){
    
$itemid = $_GET['itemid'];
$likerid = $_SESSION['userid'];

$cq = "select * from items where itemid='$itemid'";
$scq = mysqli_query($con,$cq);
$rcq = mysqli_fetch_assoc($scq);

$q = "select * from likes where itemid='$itemid'";
$s = mysqli_query($con,$q);
$count = mysqli_num_rows($s);
if($count==0){
    // not liked before
    $iq = "INSERT INTO likes (itemid,likerid) VALUES ('$itemid', '$likerid');";
    mysqli_query($con,$iq);
    ?>
    <script>
        location.replace('index.php?catid=<?php echo $rcq['categoryid'] ?>');
    </script>
    <?php
}else{
    // liked before
    $dq = "delete from likes where itemid='$itemid'";
    mysqli_query($con,$dq);
    ?>
    <script>
        location.replace('index.php?catid=<?php echo $rcq['categoryid'] ?>');
    </script>
    <?php
}
}else{
    ?>
    <script> 
    alert("Please login to like any product");
    location.replace('index.php');
    </script>
    <?php
}
?>