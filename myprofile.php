<?php
include 'admin/include/dbcon.php';
session_start();
if(!isset($_SESSION['username'])){
    ?>
    <script>location.replace('index.php')</script>
    <?php
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User Profile</title>
  <!-- Bootstrap CSS link -->
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <style>
    /* Custom CSS styles */
    body {
      background-color: #f5f5f5;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .container {
      max-width: 600px;
      margin-top: 50px;
    }

    .card {
      border: none;
      border-radius: 10px;
      box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
      background-color: #fff;
      padding: 30px;
    }

    .card-title {
      font-size: 32px;
      color: #333;
      margin-bottom: 20px;
      text-align: center;
      text-transform: uppercase;
    }

    .card-text {
      font-size: 18px;
      color: #555;
      margin-bottom: 15px;
    }

    .btn {
      padding: 8px 20px;
      font-size: 16px;
      margin-bottom: 10px;
      border-radius: 5px;
      background-color: #3498db;
      border: 2px solid #3498db;
      color: #fff;
    }
    .btn:hover {
      background-color: #2980b9;
      border-color: #2980b9;
    }

    

    
    .btn-logout{
      background-color: #e74c3c;
      border: 2px solid #e74c3c;
      color: #fff;
    }

    .btn-logout:hover{
      background-color: #d62c1a;
      border-color: #d62c1a;
    }
  </style>
</head>
<body>
  <div class="container">
    <h1 class="card-title">User Profile</h1>
    <div class="card">
      <h5 class="card-title">Username: <?php echo $_SESSION['username']; ?></h5>
      <p class="card-text">Email: <?php echo $_SESSION['useremail']; ?></p>
      <p class="card-text">Phone: <?php echo $_SESSION['userphone']; ?></p>
      <p class="card-text">Address: <?php echo $_SESSION['useraddress']; ?></p>
      <p class="card-text">Account Status: <?php echo $_SESSION['userstatus']; ?></p>
      <!-- Edit profile button -->
      <button onclick="window.location.href='editprofile.php'" type="button" class="btn btn-edit">Edit Profile</button>
      <!-- Buttons for viewing user activities -->
      <button onclick="window.location.href='likedproducts.php'" type="button" class="btn btn-activity">Liked Products</button>
      <button onclick="window.location.href='reportedproducts.php'" type="button" class="btn btn-activity">Reported Products</button>
      <button onclick="window.location.href='requestedproducts.php'" type="button" class="btn btn-activity">Requested Products</button>
      <button onclick="window.location.href='myproducts.php'" type="button" class="btn btn-activity">My Products</button>
      
      <div class="d-flex justify-content-between">
        <!-- Logout and Home page buttons -->
        <button onclick="window.location.href='userlogout.php'" type="button" class="btn btn-logout">Logout</button>
        <button onclick="window.location.href='index.php'" type="button" class="btn btn-home">Home</button>
      </div>
    </div>
  </div>
</body>
</html>
