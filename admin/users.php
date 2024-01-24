<!-- Some of the functionalities that the admin is having are:

Manage users: The admin can view, edit, delete, and ban users from the website.
Manage categories: The admin can create, edit, and delete categories for the products.
Manage products: The admin can view, edit, approve, reject, and delete products posted by the users.
Manage reports: The admin can view and resolve the reports submitted by the users for any inappropriate content or behavior.
Manage settings: The admin can change the website settings such as logo, name, description, contact details, etc. -->

<html>

<head>
    <title>Users Page</title>
    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <!-- include nav bar  -->
    <?php include 'adminnavbar.php'; ?>
    <?php
    $q1 = "select * from users";
    $s1 = mysqli_query($con, $q1);
    $c1 = mysqli_num_rows($s1);
    ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-header">
                        <h4>Users</h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                while ($r1 = mysqli_fetch_assoc($s1)) {
                                ?>
                                    <tr>
                                        <td><?php echo $r1['userid']; ?></td>
                                        <td><?php echo $r1['username']; ?></td>
                                        <td><?php echo $r1['useremail']; ?></td>
                                        <td><?php echo $r1['userphone']; ?></td>
                                        <td><?php echo $r1['status']; ?></td>
                                        <td><a href="action2.php?userid=<?php echo $r1['userid']; ?>" class="btn btn-sm btn-info">
                                                <?php
                                                if ($r1['status'] == "active") {
                                                    echo "Block";
                                                } else {
                                                    echo "Unblock";
                                                }
                                                ?>
                                            </a></td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- Bootstrap CDN -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>