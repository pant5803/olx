<?php
include 'include/dbcon.php';
session_start();
$query = "select * from site";
$selected = mysqli_query($con, $query);
$res = mysqli_fetch_assoc($selected);
?>
<?php
if(!isset($_SESSION['adminname'])){
    ?>
    <script> 
    location.replace('index.php');
    </script>
    <?php
}
?>


<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="admindashboard.php"><?php echo $res['name']; ?> Admin</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="admindashboard.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="users.php">Users</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="categories.php">Categories</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="products.php">Products</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="reports.php">Reports</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="adminsettings.php">Settings</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="signup.php">Register_NewAdmin</a>
            </li>
            
            <li class="nav-item">
              <a class="nav-link" href="logout.php">Logout</a>
            </li>

          </ul>
        </div>
</nav>
    