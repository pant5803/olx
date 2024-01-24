<?php
include 'admin/include/dbcon.php';
session_start();

$itemcategory = $_POST['itemcategory'];
$itemname = $_POST['itemname'];
$itemcondition = $_POST['itemcondition'];
$itemdescription = $_POST['itemdescription'];
$itemprice = $_POST['itemprice'];

$itemstatus = "available";

$sellerid = $_SESSION['userid'];

$q = "select * from categories where categoryname='$itemcategory'";
$s = mysqli_query($con,$q);
$r = mysqli_fetch_assoc($s);

$categoryid = $r['categoryid'];

$pic = $_FILES['itempic'];
$picname = $pic['name'];
$picpath = $pic['tmp_name'];
$dest = 'upload/'.$picname;
move_uploaded_file($picpath,$dest);

$iq = "INSERT INTO items (sellerid, categoryid,itemname,itemcondition,itemdescription,itempic,itemprice,itemstatus) VALUES ('$sellerid', '$categoryid','$itemname','$itemcondition','$itemdescription','$dest','$itemprice','$itemstatus');";
$riq = mysqli_query($con,$iq);
if($riq){
    ?>
    <script>
        alert("item available for sale. Thanks !");
        location.replace('index.php');
    </script>
    <?php
}else{
    ?>
    <script>
        alert("SORRY ! unable to process the request");
        location.replace('index.php');
    </script>
    <?php
}
?>
