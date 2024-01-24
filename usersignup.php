<?php
include 'admin/include/dbcon.php';
$site = "select * from site";
$siteselected = mysqli_query($con, $site);
$ressite = mysqli_fetch_assoc($siteselected);
?>
<html>

<head>
  <title> USER SIGN UP FORM</title>
  <link rel="stylesheet" type="text/css" href="userloginstyle.css">
</head>
<?php
if (isset($_POST['submit'])) {
  $username = $_POST['username'];
  $useremail = $_POST['useremail'];
  $userphone = $_POST['userphone'];
  $useraddress = $_POST['useraddress'];
  $userpassword = $_POST['userpassword'];
  $cuserpassword = $_POST['cuserpassword'];
  $alpha = "select * from users where useremail='$useremail'";
  $alphas = mysqli_query($con, $alpha);
  $count = mysqli_num_rows($alphas);
  if ($count != 0) {
?>
    <script>
      alert("email already registered. Please LOG IN");
      location.replace('userlogin.php');
    </script>
    <?php
  } else {
    if ($userpassword == $cuserpassword) {
      // sign up successful
      $hash = password_hash($userpassword, PASSWORD_BCRYPT);
      $token = bin2hex(random_bytes(15));
      $insert = "INSERT INTO users (username, useremail,userphone,useraddress,userpassword,status,token) VALUES ('$username', '$useremail','$userphone','$useraddress','$hash','active','$token');";
      $runinsert = mysqli_query($con, $insert);
    ?>
      <script>
        alert("user registered successfully");
        location.replace('userlogin.php');
      </script>
    <?php
    } else {
    ?>
      <script>
        alert("passwords do not match");
        location.replace('usersignup.php');
      </script>
<?php
    }
  }
}
?>

<body>
  <div class="login-root">
    <div class="box-root flex-flex flex-direction--column" style="min-height: 100vh;flex-grow: 1;">
      <div class="loginbackground box-background--white padding-top--64">
        <div class="loginbackground-gridContainer">
          <div class="box-root flex-flex" style="grid-area: top / start / 8 / end;">
            <div class="box-root" style="background-image: linear-gradient(white 0%, rgb(247, 250, 252) 33%); flex-grow: 1;">
            </div>
          </div>
          <div class="box-root flex-flex" style="grid-area: 4 / 2 / auto / 5;">
            <div class="box-root box-divider--light-all-2 animationLeftRight tans3s" style="flex-grow: 1;"></div>
          </div>
          <div class="box-root flex-flex" style="grid-area: 6 / start / auto / 2;">
            <div class="box-root box-background--blue800" style="flex-grow: 1;"></div>
          </div>
          <div class="box-root flex-flex" style="grid-area: 7 / start / auto / 4;">
            <div class="box-root box-background--blue animationLeftRight" style="flex-grow: 1;"></div>
          </div>
          <div class="box-root flex-flex" style="grid-area: 8 / 4 / auto / 6;">
            <div class="box-root box-background--gray100 animationLeftRight tans3s" style="flex-grow: 1;"></div>
          </div>
          <div class="box-root flex-flex" style="grid-area: 2 / 15 / auto / end;">
            <div class="box-root box-background--cyan200 animationRightLeft tans4s" style="flex-grow: 1;"></div>
          </div>
          <div class="box-root flex-flex" style="grid-area: 3 / 14 / auto / end;">
            <div class="box-root box-background--blue animationRightLeft" style="flex-grow: 1;"></div>
          </div>
          <div class="box-root flex-flex" style="grid-area: 4 / 17 / auto / 20;">
            <div class="box-root box-background--gray100 animationRightLeft tans4s" style="flex-grow: 1;"></div>
          </div>
          <div class="box-root flex-flex" style="grid-area: 5 / 14 / auto / 17;">
            <div class="box-root box-divider--light-all-2 animationRightLeft tans3s" style="flex-grow: 1;"></div>
          </div>
        </div>
      </div>
      <div class="box-root padding-top--24 flex-flex flex-direction--column" style="flex-grow: 1; z-index: 9;">
        <div class="box-root padding-top--48 padding-bottom--24 flex-flex flex-justifyContent--center">
          <h1><a href="index.php" rel="dofollow"><?php echo $ressite['name'] ?></a></h1>
        </div>
        <div class="formbg-outer">
          <div class="formbg">
            <div class="formbg-inner padding-horizontal--48">
              <span class="padding-bottom--15">Create your account</span>
              <form action="<?php echo htmlentities($_SERVER['PHP_SELF']) ?>" method="post" id="stripe-login">
                <!-- username  -->
                <div class="field padding-bottom--24">
                  <label for="name">Name</label>
                  <input type="text" name="username">
                </div>
                <!-- useremail  -->
                <div class="field padding-bottom--24">
                  <label for="email">Email</label>
                  <input type="email" name="useremail">
                </div>
                <!-- userphone  -->
                <div class="field padding-bottom--24">
                  <label for="phone">phone</label>
                  <input type="text" name="userphone">
                </div>
                <!-- useraddress  -->
                <div class="field padding-bottom--24">
                  <label for="address">address</label>
                  <input type="text" name="useraddress">
                </div>
                <!-- userpassword  -->
                <div class="field padding-bottom--24">
                  <label for="password">Create Password</label>
                  <input type="password" name="userpassword">
                </div>
                <!-- confirmpassword  -->
                <div class="field padding-bottom--24">
                  <label for="confirmpassword">Confirm Password</label>
                  <input type="password" name="cuserpassword">
                </div>

                <div class="field padding-bottom--24">
                  <input type="submit" name="submit" value="Continue">
                </div>
              </form>
            </div>
          </div>

          <div class="footer-link padding-top--24">
            <span>Already have an account? <a href="userlogin.php">Log In</a></span>
            <div class="listing padding-top--24 padding-bottom--24 flex-flex center-center">
              <span><a href="index.php">© <?php echo $ressite['name'] ?></a></span>
              <span><a href="contactus.php">Contact</a></span>
              <span><a href="tandc.php">Privacy & terms</a></span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>