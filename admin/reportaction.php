<?php
include 'include/dbcon.php';
$reportid = $_GET['reportid'];
$q = "select * from reports where reportid=$reportid";
$s = mysqli_query($con,$q);
$r = mysqli_fetch_assoc($s);

if($r['reportstatus']=="open"){
    // close the report
    $query = "update reports set reportstatus='closed' where reportid=$reportid";
    mysqli_query($con,$query);
}else{
    // open the report
    $query = "update reports set reportstatus='open' where reportid=$reportid";
    mysqli_query($con,$query);
}
?>
<script>
    location.replace('admindashboard.php');
</script>