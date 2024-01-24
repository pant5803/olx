<?php
include 'include/dbcon.php';
if(isset($_POST['changelogo'])){
    $pic = $_FILES['pic'];
    $picname = $pic['name'];
    $picpath = $pic['tmp_name'];
    $picerror = $pic['error'];
    if($picerror==0){
      $dest = 'imges/'.$picname;
      move_uploaded_file($picpath,$dest);
      $query = "UPDATE site SET logo = '$dest' WHERE siteid = 1;";
      $run = mysqli_query($con,$query);
      if($run){
        ?>
        <script> 
        alert("logo changed successfully");
        location.replace('adminsettings.php');
        </script>
        <?php
      }else{
        ?>
        <script> 
        alert("unable to change logo");
        location.replace('adminsettings.php');
        </script>
        <?php
      }
    }else{
      ?>
      <script> 
      alert("error in file");
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CHANGE LOGO</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container">
  <div class="row">
    <div class="col-md-6">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Upload a new logo image</h4>
          <p class="card-text">Please select an image file from your computer and click the submit button.</p>
          <form action="<?php echo htmlentities($_SERVER['PHP_SELF']) ?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
              <label for="logo">Choose a file</label>
              <input type="file" name="pic" class="form-control-file" id="logo" accept=".jpg,.png,.jpeg"  required>
            </div>
            <input type="submit" class="btn btn-primary" value="Submit" name="changelogo">
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

</body>
</html>