<?php
include 'include/dbcon.php';
if(isset($_POST['changesitedesc'])){
    $newdesc = $_POST['newdesc'];
    $query = "UPDATE site SET description = '$newdesc' WHERE siteid = 1;";
    $run = mysqli_query($con,$query);
    if($run){
        ?>
        <script>
        alert("site desc is changed successfully")
        location.replace('adminsettings.php')
        </script>
        <?php
    }else{
        ?>
        <script>
            alert("unable to change the site desc");
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
  <title>CHANGE SITE DESCRIPTION</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
  <div class="container mt-5">
    <h2>Enter New Description</h2>
    <form action="<?php echo htmlentities($_SERVER['PHP_SELF']) ?>" method="post">
      <div class="form-group">
        <label for="siteDesc">Desc :</label>
        <input type="text" class="form-control" placeholder="Enter new desc" name="newdesc" required>
      </div>
      <input type="submit" class="btn btn-primary" value="Submit" name="changesitedesc">
    </form>
  </div>

  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <!-- Optional: JavaScript/jQuery dependencies for Bootstrap -->
</body>
</html>
