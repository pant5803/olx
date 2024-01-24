<?php
include 'admin/include/dbcon.php';
$query = "select * from site";
$selected = mysqli_query($con, $query);
$res = mysqli_fetch_assoc($selected);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOME PAGE</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        /* Add your custom styles here */
        /* Adjust navbar height */
        body {
            /* background: linear-gradient(rgb(8, 8, 35), blue); */
            background-color: rgb(1, 1, 39);
        }

        .navbar-custom {
            min-height: 80px;
        }

        /* Align logo and site name */
        .navbar-brand img {
            max-height: 50px;
            margin-right: 10px;
        }

        /* Style search bar */
        .search-box {
            max-width: 300px;
        }

        .container-fluid {
            background-color: rgb(8, 8, 35);
        }

        .navbar-brand {
            color: yellow;
            font-weight: 800;
        }

        .navbar-brand:hover {
            color: yellow;
        }

        .linki {
            color: yellow;
            font-weight: 800;
        }

        .linki:hover {
            color: yellow;
            font-size: larger;
        }

        .card {
            border: 1px solid #ddd;
            border-radius: 8px;
        }

        .card-img-top {
            height: 200px;
            object-fit: cover;
            border-top-left-radius: 8px;
            border-top-right-radius: 8px;
        }

        .card-title {
            font-size: 1.25rem;
            font-weight: bold;
        }

        .card-text {
            margin-bottom: 0.5rem;
        }

        .btn-group {
            margin-top: 1rem;
        }

        .nav-item {
            margin-left: 15px;
        }
    </style>
</head>

<body>
    <!-- navbar start -->
    <?php include 'navbar.php'; ?>
    <!-- navbar finish  -->
    <!-- banner section -->
    <div class="container-fluid" style="height: 50vh;overflow: hidden;">
        <div id="bannerCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="https://tse2.mm.bing.net/th?id=OIP.BUsdQOiWaEl4BwqIlZjwawHaFL&pid=Api&P=0&h=180" class="d-block w-100" alt="Image 1" style="height: 50vh;">
                </div>
                <div class="carousel-item">
                    <img src="https://tse1.mm.bing.net/th?id=OIP.YQVHt7ReJ_h_cTHao5hOkAHaFN&pid=Api&P=0&h=180" class="d-block w-100" alt="Image 2" style="height: 50vh;">
                </div>
                <div class="carousel-item">
                    <img src="https://tse4.mm.bing.net/th?id=OIP.h5um95824SuP052RRzqF2AHaE7&pid=Api&P=0&h=180" class="d-block w-100" alt="Image 3" style="height: 50vh;">
                </div>
                <!-- Add more carousel items with additional images -->
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#bannerCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#bannerCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <!-- banner ends  -->
    <!-- category section start  -->
    <div class="container-fluid" style="text-align: center;">
        <h2 style="color: yellow;">CATEGORIES</h2>
    </div>
    <div class="container">
        <div class="row row-cols-1 row-cols-md-3 g-4">
            <?php
            $catquery = "select * from categories";
            $catselected = mysqli_query($con, $catquery);
            while ($catres = mysqli_fetch_assoc($catselected)) {
            ?>
                <div class="col">
                    <div class="card h-100">
                        <img src="<?php echo "admin/" . $catres['categorylogo']; ?>" class="card-img-top" alt="Category Image">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $catres['categoryname']; ?></h5>
                            <p class="card-text">Click here to see the available products belonging to this category.</p>
                        </div>
                        <div class="card-footer">
                            <button type="button" onclick="window.location.href='index.php?catid=<?php echo $catres['categoryid'] ?>'" class="btn btn-primary btn-sm">View Products of this category</button>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
    <!-- category section end  -->

    <!-- show products available for sale  -->
    <div class="container-fluid" style="text-align: center;">
        <h2 style="color: yellow;">PRODUCTS AVAILABLE</h2>
    </div>
    <?php
    if (isset($_GET['catid'])) {
        // if user submit category id
        $catid = $_GET['catid'];
        $q1 = "select * from items where categoryid='$catid'";
        $sq1 = mysqli_query($con, $q1);
    ?>
        <div class="container">
            <div class="row">
                <?php
                while ($rq1 = mysqli_fetch_assoc($sq1)) {
                ?>

                    <div class="col-md-4">
                        <div class="card mb-4 shadow-sm">
                            <img class="card-img-top" src="<?php echo $rq1['itempic']; ?>" alt="Product Image">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $rq1['itemname']; ?></h5>
                                <p class="card-text">Condition: <?php echo $rq1['itemcondition']; ?></p>
                                <p class="card-text">Price: <?php echo $rq1['itemprice']; ?>Rs.</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <button type="button" onclick="window.location.href='like.php?itemid=<?php echo $rq1['itemid'] ?>'" class="btn btn-sm btn-outline-secondary">
                                            <?php
                                            $itemid = $rq1['itemid'];

                                            if (isset($_SESSION['userid'])) {
                                                $uid = $_SESSION['userid'];
                                            } else {
                                                $uid = -1;
                                            }
                                            $qx = "select * from likes where itemid='$itemid' and likerid='$uid'";
                                            $sx = mysqli_query($con, $qx);
                                            $count = mysqli_num_rows($sx);
                                            if ($count == 0) {
                                                echo "Like";
                                            } else {
                                                echo "Liked";
                                            }
                                            ?>
                                        </button>

                                        <button type="button" onclick="window.location.href='viewmore.php?itemid=<?php echo $rq1['itemid']; ?>'" class="btn btn-sm btn-outline-secondary">View More</button>
                                        <button type="button" onclick="window.location.href='report.php?itemid=<?php echo $rq1['itemid'] ?>'" class="btn btn-sm btn-outline-danger">
                                            <?php
                                            $qx2 = "select * from reports where itemid='$itemid' and reporterid='$uid'";
                                            $sx2 = mysqli_query($con, $qx2);
                                            $count2 = mysqli_num_rows($sx2);
                                            if ($count2 == 0) {
                                                echo "Report";
                                            } else {
                                                echo "Reported";
                                            }
                                            ?>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
    <?php
    } else {
        $q1 = "select * from items ";
        if (isset($_POST['search'])) {
            $searcheditem = $_POST['searcheditem'];
            $q1 = "select * from items where itemname like '%$searcheditem%'";
        }
        $sq1 = mysqli_query($con, $q1);
        $countq1 = mysqli_num_rows($sq1);
    ?>
        <div class="container">
            <div class="row">
                <?php
                if($countq1==0){
                    echo "<h3 style='color:grey;'>no results found</h3>";
                }
                while ($rq1 = mysqli_fetch_assoc($sq1)) {
                ?>

                    <div class="col-md-4">
                        <div class="card mb-4 shadow-sm">
                            <img class="card-img-top" src="<?php echo $rq1['itempic']; ?>" alt="Product Image">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $rq1['itemname']; ?></h5>
                                <p class="card-text">Condition: <?php echo $rq1['itemcondition']; ?></p>
                                <p class="card-text">Price: <?php echo $rq1['itemprice']; ?>Rs.</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">

                                        <button type="button" onclick="window.location.href='like.php?itemid=<?php echo $rq1['itemid'] ?>'" class="btn btn-sm btn-outline-secondary">
                                            <?php
                                            $itemid = $rq1['itemid'];

                                            if (isset($_SESSION['userid'])) {
                                                $uid = $_SESSION['userid'];
                                            } else {
                                                $uid = -1;
                                            }
                                            $qx = "select * from likes where itemid='$itemid' and likerid='$uid'";
                                            $sx = mysqli_query($con, $qx);
                                            $count = mysqli_num_rows($sx);
                                            if ($count == 0) {
                                                echo "Like";
                                            } else {
                                                echo "Liked";
                                            }
                                            ?>
                                        </button>

                                        <button type="button" class="btn btn-sm btn-outline-secondary" onclick="window.location.href='viewmore.php?itemid=<?php echo $rq1['itemid']; ?>'">View More</button>
                                        <button type="button" onclick="window.location.href='report.php?itemid=<?php echo $rq1['itemid'] ?>'" class="btn btn-sm btn-outline-danger">
                                            <?php
                                            $qx2 = "select * from reports where itemid='$itemid' and reporterid='$uid'";
                                            $sx2 = mysqli_query($con, $qx2);
                                            $count2 = mysqli_num_rows($sx2);
                                            if ($count2 == 0) {
                                                echo "Report";
                                            } else {
                                                echo "Reported";
                                            }
                                            ?>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
    <?php
    }
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>