<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Admin Login</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/index.css">
</head>
<body>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <form class="login-form" action="validate.php" method="post">
          <h2 class="text-center mb-4">Admin Login</h2>
          <div class="form-group">
            <label for="adminEmail">Email:</label>
            <input type="email" class="form-control" id="adminEmail" placeholder="Enter email" name="email" required>
          </div>
          <div class="form-group">
            <label for="adminPassword">Password:</label>
            <input type="password" class="form-control" id="adminPassword" placeholder="Enter password" name="password" required>
          </div>
          <input type="submit" class="btn btn-primary btn-block" value="Login" name="login">
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
