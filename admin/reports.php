<html>

<head>
    <title>Reports Page</title>
    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <!-- include nav bar  -->
    <?php include 'adminnavbar.php'; ?>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-header">
                        <h4>All Reports</h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Report ID</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                    <th>ViewReport</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $q4 = "select * from reports";
                                $s4 = mysqli_query($con, $q4);
                                ?>
                                <?php

                                while ($r4 = mysqli_fetch_assoc($s4)) {
                                ?>
                                    <tr>
                                        <td><?php echo $r4['reportid']; ?></td>
                                        <td><?php echo $r4['reportstatus']; ?></td>
                                        <td><a href="reportaction.php?reportid=<?php echo $r4['reportid']; ?>" class="btn btn-sm btn-info">
                                                <?php
                                                if ($r4['reportstatus'] == "open") {
                                                    echo "Close";
                                                } else {
                                                    echo "Open";
                                                }
                                                ?>
                                            </a></td>
                                        <td><a href="viewreport.php?reportid=<?php echo $r4['reportid']; ?>">View</a></td>
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