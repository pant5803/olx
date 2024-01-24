<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Item Details</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url('images/bg.jpg');
            background-size: cover;
        }

        .container {
            padding-top: 50px;
        }

        .item-details {
            background-color: #fff;
            opacity: 0.8;
            padding: 30px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            overflow-x: scroll;
        }

        .item-details img {
            max-width: 100%;
            height: auto;
            border-radius: 5px;
            margin-bottom: 20px;
            box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.2);
        }

        .item-details h2 {
            font-size: 24px;
            margin-bottom: 15px;
            color: #333;
        }

        .item-details p {
            font-size: 16px;
            margin-bottom: 10px;
            color: #555;
        }

        .btn-purchase {
            padding: 10px 30px;
            font-size: 18px;
            background-color: #3498db;
            border-color: #3498db;
        }

        .btn-purchase:hover {
            background-color: #2980b9;
            border-color: #2980b9;
        }
    </style>
</head>

<body>
    <?php
    include 'adminnavbar.php';
    ?>
    <?php
    $itemid = $_GET['itemid'];

    $q = "select * from items where itemid='$itemid'";
    $s = mysqli_query($con, $q);
    $r = mysqli_fetch_assoc($s);

    $catid = $r['categoryid'];

    $cat = "select * from categories where categoryid='$catid'";
    $selcat = mysqli_query($con, $cat);
    $catres = mysqli_fetch_assoc($selcat);

    $sellerid = $r['sellerid'];
    $q2 = "select * from users where userid='$sellerid'";
    $s2 = mysqli_query($con, $q2);
    $r2 = mysqli_fetch_assoc($s2);
    ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <img src="../<?php echo $r['itempic']; ?>" class="img-fluid" alt="Item Image">
            </div>
            <div class="col-md-6 item-details">
                <h2><?php echo $r['itemname']; ?></h2>
                <p><strong>Category:</strong> <?php echo $catres['categoryname']; ?></p>
                <p><strong>Seller Address:</strong> <?php echo $r2['useraddress']; ?></p>
                <p><strong>Item Price:</strong> <?php echo $r['itemprice']; ?> Rs.</p>
                <p><strong>Item Condition:</strong> <?php echo $r['itemcondition']; ?></p>
                <p><strong>Item Description:</strong></p>
                <p><?php echo $r['itemdescription']; ?></p>
                <p><strong>Item Status:</strong> <?php echo $r['itemstatus']; ?></p>
                <br>
                <span><a href="products.php">Go Back</a></span>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>