

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Site Settings</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
  <!-- include nav bar  -->
  <?php include 'adminnavbar.php'; ?>
  <?php
include 'include/dbcon.php';
$query = "select * from site";
$selected = mysqli_query($con,$query);
$count = mysqli_num_rows($selected);
$res = mysqli_fetch_assoc($selected);
if($count==1){
    $sitelogo = $res['logo']; // path where you stored the image
    $sitename = $res['name'];
    $sitedesc = $res['description'];

}else{
    ?>
    <script>
    alert("site table in DB should have only 1 entry");
    location.replace('admindsettings.php');
    </script>
    <?php
}
?>
<div class="container">
  <div class="row">
    <div class="col-md">
      <div class="card">
        <div class="card-body text-center">
          <img src="<?php echo $sitelogo; ?>" alt="SITE LOGO" class="img-fluid rounded-circle mb-2" width="128" height="128">
          <h4 class="card-title"><?php echo $sitename; ?></h4>
          <p class="card-text"><?php echo $sitedesc; ?></p>
          <a href="updatelogo.php" class="btn btn-primary">Change Logo</a>
          <a href="changesitename.php" class="btn btn-secondary">Change Site Name</a>
          <a href="changedescription.php" class="btn btn-info">Change description</a>
        </div>
      </div>
    </div>
  </div>
</div>

</body>
</html>