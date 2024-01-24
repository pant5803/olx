<?php
include 'include/dbcon.php';
if(isset($_POST['changesitename'])){
    $newsitename = $_POST['newsitename'];
    $query = "UPDATE site SET name = '$newsitename' WHERE siteid = 1;";
    $run = mysqli_query($con,$query);
    if($run){
        ?>
        <script>
        alert("site name is changed successfully")
        location.replace('adminsettings.php')
        </script>
        <?php
    }else{
        ?>
        <script>
            alert("unable to change the site name");
            location.replace('adminsettings.php');
        </script>
        <?php
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>CHANGE SITE NAME</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
  <div class="container mt-5">
    <h2>Enter New Site Name</h2>
    <form action="<?php echo htmlentities($_SERVER['PHP_SELF']) ?>" method="post">
      <div class="form-group">
        <label for="siteName">Site Name:</label>
        <input type="text" class="form-control" id="siteName" placeholder="Enter new site name" name="newsitename" required>
      </div>
      <input type="submit" class="btn btn-primary" value="Submit" name="changesitename">
    </form>
  </div>

  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <!-- Optional: JavaScript/jQuery dependencies for Bootstrap -->
</body>
</html>
