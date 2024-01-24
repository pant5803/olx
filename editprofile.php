<?php
include 'admin/include/dbcon.php';
session_start();
if(!isset($_SESSION['username'])){
    ?>
    <script>location.replace('index.php')</script>
    <?php
}
?>

<?php
    $userid = $_SESSION['userid'];
?>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="userloginstyle.css">
</head>
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
          <h1><a href="index.php" rel="dofollow">User Details</a></h1>
        </div>
        <div class="formbg-outer">
          <div class="formbg">
            <div class="formbg-inner padding-horizontal--48">
              <span class="padding-bottom--15">Edit Profile</span>
              <form action="editprofile2.php" method="post" id="stripe-login">
                <!-- username  -->
                <div class="field padding-bottom--24">
                  <label for="name">Name</label>
                  <input type="text" value="<?php echo $_SESSION['username']; ?>" name="username" required>
                </div>
                <!-- useremail  -->
                <div class="field padding-bottom--24">
                  <label for="email">Email</label>
                  <input type="email" value="<?php echo $_SESSION['useremail']; ?>" name="useremail" required>
                </div>
                <!-- userphone  -->
                <div class="field padding-bottom--24">
                  <label for="phone">phone</label>
                  <input type="text" value="<?php echo $_SESSION['userphone']; ?>" name="userphone" required>
                </div>
                <!-- useraddress  -->
                <div class="field padding-bottom--24">
                  <label for="address">address</label>
                  <input type="text" value="<?php echo $_SESSION['useraddress']; ?>" name="useraddress" required>
                </div>
                <!-- userpassword  -->
                <div class="field padding-bottom--24">
                  <label for="password"> Password</label>
                  <input type="password" value="<?php echo $_SESSION['unhashedpassword']; ?>" name="userpassword" required>
                </div>
                
                <div class="field padding-bottom--24">
                  <input type="submit" name="submit" value="submit">
                </div>
              </form>
            </div>
          </div>
          
        </div>
      </div>
    </div>
  </div>
</body>

</html>