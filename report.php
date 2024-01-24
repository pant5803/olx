<?php
include 'admin/include/dbcon.php';
session_start();
if(isset($_SESSION['username'])){
    if(isset($_POST['submit'])){
$itemid = $_GET['itemid'];
$reporterid = $_SESSION['userid'];
$reportdescription=$_POST['reportdescription'];
$cq = "select * from items where itemid='$itemid'";
$scq = mysqli_query($con,$cq);
$rcq = mysqli_fetch_assoc($scq);
$victimid=$rcq['sellerid'];

    // report
    $iq = "INSERT INTO reports (reporterid,victimid,itemid,reportdesc,reportstatus) VALUES ('$reporterid', '$victimid','$itemid','$reportdescription','open');";
    mysqli_query($con,$iq);
    ?>
    <script>
        alert("your report has been recorded");
        location.replace('index.php?catid=<?php echo $rcq['categoryid'] ?>');
    </script>
    <?php
    }else{
        $itemid=$_GET['itemid'];
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container">
  <div class="row">
    <div class="col-md-6">
      <form action="report.php?itemid=<?php echo $itemid; ?>" method="post">
        <div class="form-group">
          <label for="Report">Fill the description of report</label>
          <input type="text" class="form-control"  placeholder="report description" name="reportdescription">
        </div>
        <input type="submit" class="btn btn-success" value="Submit" name="submit">
      </form>
    </div>
  </div>
</div>
</body>
</html>
    <?php
}
}else{
    ?>
    <script> 
    alert("Please login to report any product");
    location.replace('index.php');
    </script>
    <?php
}
?>