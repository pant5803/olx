
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admin Signup</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/index.css">
</head>

<body>
    <!-- include nav bar  -->
    <?php include 'adminnavbar.php'; ?>
    
<?php
if (isset($_POST['signup'])) {
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);

    $hash = password_hash($password, PASSWORD_BCRYPT);
    $emailquery = "select * from admins where adminemail='$email'";
    $selectedmail = mysqli_query($con, $emailquery);
    $countemail = mysqli_num_rows($selectedmail);

    if ($countemail != 0) {
?>
        <script>
            alert("admin already registered.");
            location.replace('admindashboard.php');
        </script>
        <?php
    } else {
        if ($password == $cpassword) {
            $insert = "INSERT INTO admins (adminname,adminemail,adminpassword) VALUES ('$name','$email','$hash')";
            $inserted = mysqli_query($con, $insert);
            if ($inserted) {
        ?>
                <script>
                    alert("admin signup successful")
                </script>
            <?php
            } else {
            ?>
                <script>
                    alert("admin signup failed")
                </script>
            <?php
            }
            ?>
            <script>
                location.replace('admindashboard.php');
            </script>
<?php
        }else{
            ?>
            <script>
            alert("passwords do not match");
            location.replace('signup.php');
            </script>
            <?php
        }
    }
}
?>
    
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form class="login-form" action="<?php echo htmlentities($_SERVER['PHP_SELF']) ?>" method="post">
                    <h2 class="text-center mb-4">Admin Signup</h2>
                    <div class="form-group">
                        <label for="adminEmail">Email:</label>
                        <input type="email" class="form-control" id="adminEmail" placeholder="Enter email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="adminName">Name:</label>
                        <input type="text" class="form-control" id="adminName" placeholder="Enter name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="adminPassword">Password:</label>
                        <input type="password" class="form-control" id="adminPassword" placeholder="Enter password" name="password" required>
                    </div>
                    <div class="form-group">
                        <label for="adminPassword">Confirm Password:</label>
                        <input type="password" class="form-control" id="adminPassword" placeholder="Enter password" name="cpassword" required>
                    </div>
                    <input type="submit" class="btn btn-primary btn-block" value="SignUp" name="signup">
                    </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>